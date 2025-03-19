<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use HasFactory;

    protected $table = 'instrumento';
    protected $primaryKey = 'id_instrumento';
    public $timestamps = false;

    /**
     * The roles that belong to the Instrumento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function musicos()
    {
        return $this->belongsToMany(Musico::class, 'musico_intrumento', 'id_intrumento', 'id_usuario');
    }
}
