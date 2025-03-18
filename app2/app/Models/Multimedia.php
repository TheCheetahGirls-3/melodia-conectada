<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model
{
    use HasFactory;

    protected $table = 'multimedia';
    protected $primaryKey = 'id_multimedia';
    public $timestamps = false;

    /**
     * Get the user that owns the Multimedia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_usuario');
    }

    /**
     * Get the user that owns the Multimedia
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo_multimedia()
    {
        return $this->belongsTo(TipoMultimedia::class, 'id_tipo_multimedia');
    }
}
