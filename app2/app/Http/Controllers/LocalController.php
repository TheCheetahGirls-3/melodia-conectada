<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén el parámetro de consulta 'es_accesible' (opcional)
        $esAccesible = $request->query('es_accesible');

        // Si se proporciona el parámetro, filtra los locales
        if ($esAccesible !== null) {
        $locales = Local::where('es_accesible', $esAccesible)->get();
        } else {
            // Si no se proporciona, devuelve todos los locales
            $locales = Local::all();
        }

        // Retorna los locales como una colección de recursos
        return LocalResource::collection($locales);
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
    public function show(Local $local)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Local $local)
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
