<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
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
