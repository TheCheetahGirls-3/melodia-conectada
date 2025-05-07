<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function evento($idUsuario)
    {
        $usuario = Usuario::with('clientes')->find($idUsuario);

        if (!$usuario) {
            return redirect()->back()->with('error', 'Usuario no encontrado.');
        }

        return view('nuevoevento', compact('usuario'));
    }

    public function crearEvento(Request $request)
    {
        $evento = new Evento();

        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->id_usuario = $request->input('id_usuario');

        $evento->save();

        return redirect('/perfil');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
