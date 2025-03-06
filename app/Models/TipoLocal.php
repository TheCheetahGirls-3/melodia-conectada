<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoLocal extends Model
{
    use HasFactory;

    protected $table = 'tipo_local';
    protected $primaryKey = 'id_tipo_local';
    public $timestamps = false;

    /**
     * Get all of the comments for the TipoLocal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function locales()
    {
        return $this->hasMany(Local::class, 'id_tipo_local');
    }
}
