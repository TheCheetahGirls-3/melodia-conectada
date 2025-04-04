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

    public function filtrar(Request $request)
    {
        $query = Musico::with([
            'cliente.usuario',
            'instrumentos',
            'generos'
        ])->query();


        if ($request->has('instrumentos') && $request->input('intrumentos') != '') {
            $query->whereHas('intrumentos', function ($q) use ($request) {
                $q->where('id_intrumentos', 'like', '%' . $request->input('instrumento') . '%');
            });
        }
        if ($request->has('generos') && $request->input('generos') != '') {
            $query->whereHas('generos', function ($q) use ($request) {
                $q->where('id_genero', 'like', '%' . $request->input('genero') . '%');
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
        //
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
