<?php

namespace App\Models;

use App\Models\TipoUsuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    /**
     * Get the user that owns the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo_usuario()
    {
        return $this->belongsTo(TipoUsuario::class, 'id_tipo_usuario');
    }

    //Este tiene la hasOne porque la clave foranea está en el cliente.

    /**
     * Get the user associated with the Usuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function clientes()
    {
        return $this->hasOne(Cliente::class, 'id_usuario');
    }
}
