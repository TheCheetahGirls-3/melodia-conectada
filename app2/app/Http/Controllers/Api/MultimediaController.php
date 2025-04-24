<?php

namespace App\Http\Controllers\Api;

use App\Models\Multimedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MultimediaResource;

class MultimediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $multimedias = Multimedia::all();
        return MultimediaResource::collection($multimedias);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'archivo' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mp3,mov',
        ]);

        $archivo = $request->file('archivo');

        $ruta = $archivo->store('multimedia/multimedia_perfil', 'public');

        $rutaPublica = "storage/{$ruta}";

        $tipoMultimedia = $this->determinarTipoMultimedia($archivo);

        $multimedia = Multimedia::create([
            'id_usuario' => $request->input('id_usuario'),
            // 'id_usuario' => Auth::id(),
            // 'id_usuario' => auth()->id(),
            'ruta' => $rutaPublica,
            'id_tipo_multimedia' => $tipoMultimedia,
        ]);

        return response()->json($multimedia, 201);
    }
    private function determinarTipoMultimedia($archivo)
    {
        // Determinar si es una imagen o un video
        $mime = $archivo->getMimeType();

        if (strpos($mime, 'image') !== false) {
            return 1; // Imagen
        } elseif (strpos($mime, 'video') !== false) {
            return 2; // Video
        } elseif (strpos($mime, 'audio') !== false) {
            return 3; // Audio
        }

        return null;
    }


    /**
     * Display the specified resource.
     */
    public function show(Multimedia $multimedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Multimedia $multimedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Multimedia $multimedia)
    {
        //
    }
}
