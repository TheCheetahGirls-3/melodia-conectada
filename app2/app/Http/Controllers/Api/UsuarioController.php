<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UsuarioResource;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::with('clientes')->get();
        return UsuarioResource::collection($usuarios);
    }

    public function obtenerPerfil($id)
    {
        try {
            $usuario = Usuario::with([
                'clientes',
                'clientes.musicos.instrumentos',
                'clientes.musicos.generos',
                'clientes.locales.tipo_local',
                'clientes.multimedias'
            ])->findOrFail($id);

            return new UsuarioResource($usuario);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al cargar el perfil',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
