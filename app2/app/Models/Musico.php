<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musico extends Model
{
    use HasFactory;

    protected $table = 'musico';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    /**
     * Get the cliente that owns the Musico
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_usuario');
    }

    /**
     * The roles that belong to the Musico
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function generos()
    {
        return $this->belongsToMany(Genero::class, 'musico_genero', 'id_usuario', 'id_genero');
    }

    /**
     * The roles that belong to the Musico
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function intrumentos()
    {
        return $this->belongsToMany(Instrumento::class, 'musico_instrumento', 'id_usuario', 'id_instrumento');
    }

    /**
     * The roles that belong to the Musico
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, 'contrato', 'id_usuario', 'id_evento')
                    ->withPivot('fecha_inicio', 'fecha_fin');
    }

     /**
     * The roles that belong to the Local
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function locales()
    {
        return $this->belongsToMany(Local::class, 'mensaje', 'id_usuario_musico', 'id_usuario_local')
                    ->withPivot('contenido', 'fecha_hora', 'id_emisor', 'es_leido');
    }

}
