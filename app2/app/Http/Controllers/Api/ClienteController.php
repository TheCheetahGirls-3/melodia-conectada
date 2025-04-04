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
            'ubicacion' => 'required|string',
            'nombre' => 'required|string',
            'telefono' => 'nullable|string',
            'descripcion' => 'nullable|string',
            'foto_perfil' => 'nullable|string',
        ]);

        // Crear un nuevo cliente
        $cliente = new Cliente();
        $cliente->id_usuario = $validated['id_usuario'];
        $cliente->ubicacion = $validated['ubicacion'];
        $cliente->nombre = $validated['nombre'];
        $cliente->telefono = $validated['telefono'];
        $cliente->descripcion = $validated['descripcion'];
        $cliente->foto_perfil = $validated['foto_perfil'];
        $cliente->save();

        return response()->json($cliente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
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
