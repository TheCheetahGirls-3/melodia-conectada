<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'genero';
    protected $primaryKey = 'id_genero';
    public $timestamps = false;

    /**
     * The musicos that belong to the Genero
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function musicos(): BelongsToMany
    {
        return $this->belongsToMany(Musico::class, 'musico_genero', 'id_genero', 'id_usuario');
    }
}
