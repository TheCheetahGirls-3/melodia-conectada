<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MusicoResource;
use App\Models\Musico;
use Illuminate\Http\Request;

class MusicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $musicos = Musico::with([
            'cliente.usuario',
            'instrumentos',
            'generos'
        ])->get();
        return MusicoResource::collection($musicos);
    }

    public function filtrar(?int  $instrumento = null, ?int $genero = null)
    {
        $query = Musico::with([
            'cliente.usuario',
            'instrumentos',
            'generos'
        ]);

        if ($instrumento != null && $instrumento != '') {
            $query->whereHas('instrumentos', function ($q) use ($instrumento) {
                $q->where('instrumento.id_instrumento', $instrumento);
            });
        }
        if ($genero != null && $genero != '') {
            $query->whereHas('generos', function ($q) use ($genero) {
                $q->where('genero.id_genero', $genero);
            });
        }

        $musicos = $query->get();


        return MusicoResource::collection($musicos);
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
        $musico = new Musico();
        $musico->id_usuario = $validated['id_usuario'];

        $musico->save();

        return response()->json([
            'cliente' => $musico  // si quieres devolver el cliente creado
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Musico $musico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Musico $musico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Musico $musico)
    {
        //
    }
}
