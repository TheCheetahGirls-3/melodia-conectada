<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $table = 'mensaje';
    protected $fillable = ['id_usuario_musico', 'id_usuario_local', 'contenido', 'fecha_hora','es_leido','id_emisor'];
    public $timestamps = true;

}
