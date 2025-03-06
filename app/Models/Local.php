<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
