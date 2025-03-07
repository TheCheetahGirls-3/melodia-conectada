<?php

namespace App\Models;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoUsuario extends Model
{
    use HasFactory;


    protected $table = 'tipo_usuario';
    protected $primaryKey = 'id_tipo_usuario';
    public $timestamps = false;
    /**
     * Get all of the comments for the TipoUsuario
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_tipo_usuario');
    }
}
