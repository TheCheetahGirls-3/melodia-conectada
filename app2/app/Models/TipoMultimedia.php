<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMultimedia extends Model
{
    use HasFactory;

    protected $table = 'tipo_multimedia';
    protected $primaryKey = 'id_tipo_multimedia';
    public $timestamps = false;

    /**
     * Get all of the comments for the TipoMultimedia
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function multimedias()
    {
        return $this->hasMany(Multimedia::class, 'id_tipo_multimedia');
    }
}
