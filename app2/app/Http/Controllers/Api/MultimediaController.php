<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MultimediaResource;
use App\Models\Multimedia;
use Illuminate\Http\Request;

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

        // Validar el archivo
        $request->validate([
            'archivo' => 'required|file|mimes:jpeg,png,jpg,gif,mp4,mov|max:10240', // Máximo 10MB
        ]);

        // Obtener el archivo
        $archivo = $request->file('archivo');

        // Guardar el archivo en la carpeta pública
        $ruta = $archivo->store('images/imagenes_perfil', 'public'); // Ruta relativa al disco público

        // Agregar el prefijo '/storage' para que sea accesible desde el navegador
        $rutaPublica = "/storage/{$ruta}";

        // Determinar el tipo de multimedia (imagen o video)
        $tipoMultimedia = $this->determinarTipoMultimedia($archivo);

        // Crear un registro en la base de datos
        $multimedia = Multimedia::create([
            'id_usuario' => auth()->id(), // ID del usuario autenticado
            'ruta' => $rutaPublica, // Guarda la ruta accesible desde el navegador
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
            return 3; // Video
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
