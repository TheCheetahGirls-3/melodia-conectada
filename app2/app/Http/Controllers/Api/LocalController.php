<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocalResource;
use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locales = Local::with(['tipo_local', 'cliente.usuario'])->get();
        return LocalResource::collection($locales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_usuario' => 'required|exists:usuario,id_usuario',  // Validar que el usuario existe

        ]);
        // Crear un nuevo cliente
        $local = new Local();
        $local->id_usuario = $validated['id_usuario'];

        $local->save();

        return response()->json([
            'cliente' => $local  // si quieres devolver el cliente creado
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Local $local)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local)
    {
        //
    }
}
