<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    /**
     * Get the user that owns the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    /**
     * Get all of the comments for the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function multimedias()
    {
        return $this->hasMany(Multimedia::class, 'id_usuario');
    }

    /**
     * Get the user associated with the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function musicos()
    {
        return $this->hasOne(Musico::class, 'id_usuario');
    }

    /**
     * Get the user associated with the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function locales()
    {
        return $this->hasOne(Local::class, 'id_usuario');
    }
}
