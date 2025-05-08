<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource..
     */

    public function index()
    {
        $clientes = Cliente::with('usuario', 'musicos.instrumentos','musicos.generos', 'locales.tipo_local')->get();
        return ClienteResource::collection($clientes);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_usuario' => 'required|exists:usuario,id_usuario',  // Validar que el usuario existe
            'latitud' => 'required',
            'longitud' => 'required',
            // 'nombre' => 'nullable|string',
            // 'telefono' => 'nullable|string',
            // 'descripcion' => 'nullable|string',
            // 'foto_perfil' => 'nullable|string',
        ]);

        // Crear un nuevo cliente
        $cliente = new Cliente();
        $cliente->id_usuario = $validated['id_usuario'];
        $cliente->ubicacion = $validated['latitud'] . "," . $validated['longitud'];
        // $cliente->nombre = $validated['nombre'];
        // $cliente->telefono = $validated['telefono'];
        // $cliente->descripcion = $validated['descripcion'];
        // $cliente->foto_perfil = $validated['foto_perfil'];
        $cliente->save();

        return response()->json([
            'cliente' => $cliente  // si quieres devolver el cliente creado
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Encuentra al cliente por su id_usuario
        $cliente = Cliente::where('id_usuario', $id)->first();

        // Verifica si el cliente existe
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);  // Respuesta 404 si no se encuentra
        }

        // Si quieres devolver solo un cliente con un recurso
        return new ClienteResource($cliente);

        // Si no usas un recurso, puedes devolver el cliente directamente
        // return response()->json($cliente, 200);
    }

    public function obtenerChats($idUsuario)
    // Obtiene los últimos mensajes de cada chat del usuario logueado,
    // mostrando el contacto (emisor o receptor contrario), su nombre, foto,
    // el contenido del último mensaje y la fecha, agrupando por contacto.

    {
        $chats = \DB::table('mensaje')
            ->join('cliente as emisor', 'mensaje.id_emisor', '=', 'emisor.id_usuario')
            ->join('cliente as receptor', 'mensaje.id_receptor', '=', 'receptor.id_usuario')
            ->select(
                \DB::raw("IF(mensaje.id_emisor = $idUsuario, mensaje.id_receptor, mensaje.id_emisor) as id_contacto"),
                \DB::raw("IF(mensaje.id_emisor = $idUsuario, receptor.nombre, emisor.nombre) as contacto_nombre"),
                \DB::raw("IF(mensaje.id_emisor = $idUsuario, receptor.foto_perfil, emisor.foto_perfil) as contacto_foto"),
                'mensaje.contenido as mensaje_texto',
                'mensaje.fecha_hora'
            )
            ->where(function ($query) use ($idUsuario) {
                $query->where('mensaje.id_emisor', $idUsuario)
                    ->orWhere('mensaje.id_receptor', $idUsuario);
            })
            ->orderBy('mensaje.fecha_hora', 'desc')
            ->get()
            ->groupBy('id_contacto')
            ->map(function ($group) {
                return $group->first();
            })
            ->values();

        return response()->json($chats);
    }
    public function obtenerMensajeEstadistica($idUsuario, $esMusico){

        $esMusico = filter_var($esMusico, FILTER_VALIDATE_BOOLEAN);
        $estadisticas = \DB::table('mensaje')
            ->where(function ($query) use ($idUsuario, $esMusico) {
                if ($esMusico) {
                    // Si es músico
                    $query->where(function ($q) use ($idUsuario) {
                        $q->where('contenido', 'LIKE' , '%Me gustaría contratarte para algún evento futuro%')
                        ->where('id_receptor', $idUsuario);
                    })->orWhere(function ($q) use ($idUsuario) {
                        $q->where('contenido', 'LIKE' , '%Me gustaría participar en tu evento publicado%')
                        ->where('id_emisor', $idUsuario);
                    });
                } else {
                    // Si es local
                    $query->where(function ($q) use ($idUsuario) {
                        $q->where('contenido', 'LIKE' , '%Me gustaría contratarte para algún evento futuro%')
                        ->where('id_emisor', $idUsuario);
                    })->orWhere(function ($q) use ($idUsuario) {
                        $q->where('contenido', 'LIKE' , '%Me gustaría participar en tu evento publicado%')
                        ->where('id_receptor', $idUsuario);
                    });
                }
            })
            ->get();

        return response()->json($estadisticas);
    }

    public function obtenerMensajesEntreUsuarios($idUsuario1, $idUsuario2)
    {
        $mensajes = \DB::table('mensaje')
            ->where(function ($query) use ($idUsuario1, $idUsuario2) {
                $query->where('id_emisor', $idUsuario1)
                    ->where('id_receptor', $idUsuario2);
            })
            ->orWhere(function ($query) use ($idUsuario1, $idUsuario2) {
                $query->where('id_emisor', $idUsuario2)
                    ->where('id_receptor', $idUsuario1);
            })
            ->orderBy('fecha_hora', 'asc') // Ordenar por fecha ascendente
            ->get();

        return response()->json($mensajes);
    }

    public function enviarMensaje(Request $request)
    {
        $validated = $request->validate([
            'contenido' => 'required|string|max:255',
            'id_emisor' => 'required|exists:usuario,id_usuario',
            'id_receptor' => 'required|exists:usuario,id_usuario',
            'es_leido' => 'required|boolean',
            'tipo_usuario' => 'required|in:2,3', // 2 para músico, 3 para local
        ]);

        $mensaje = \DB::table('mensaje')->insertGetId([
            'id_usuario_musico' => $validated['tipo_usuario'] == 2 ? $validated['id_emisor'] : $validated['id_receptor'],
            'id_usuario_local' => $validated['tipo_usuario'] == 3 ? $validated['id_emisor'] : $validated['id_receptor'],
            'contenido' => $validated['contenido'],
            'fecha_hora' => now(),
            'id_emisor' => $validated['id_emisor'],
            'id_receptor' => $validated['id_receptor'],
            'es_leido' => $validated['es_leido'],
        ]);

        return response()->json([
            'id' => $mensaje,
            'contenido' => $validated['contenido'],
            'fecha_hora' => now(),
            'id_emisor' => $validated['id_emisor'],
            'id_receptor' => $validated['id_receptor'],
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
