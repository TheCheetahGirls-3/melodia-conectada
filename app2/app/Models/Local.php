<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Local extends Model
{
    use HasFactory;

    protected $table = 'local';
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
     * Get the user that owns the Local
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo_local()
    {
        return $this->belongsTo(TipoLocal::class, 'id_tipo_local');
    }

    /**
     * Get all of the comments for the Local
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eventos()
    {
        return $this->hasMany(Evento::class, 'id_usuario');
    }

    /**
     * The roles that belong to the Local
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function musicos(): BelongsToMany
    {
        return $this->belongsToMany(Musico::class, 'mensaje', 'id_usuario_local', 'id_usuario_musico')
                    ->withPivot('contenido', 'fecha_hora', 'id_emisor', 'es_leido');
    }
}
