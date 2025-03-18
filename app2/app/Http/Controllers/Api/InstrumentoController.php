<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\InstrumentoResource;
use App\Models\Instrumento;
use Illuminate\Http\Request;

class InstrumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instrumentos = Instrumento::all();
        return InstrumentoResource::collection($instrumentos);
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
    public function show(Instrumento $instrumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Instrumento $instrumento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Instrumento $instrumento)
    {
        //
    }
}
