<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contrato';
    protected $primariKey = ['id_usuario', 'id_evento'];
    protected $fillable = ['id_usuario', 'id_evento', 'fecha_inicio', 'fecha_fin'];
    public $timestamps = false;

    /**
     * Get the user that owns the Contrato
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function musicos()
    {
        return $this->belongsTo(Musico::class, 'id_usuario');
    }

    /**
     * Get the user that owns the Contrato
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function eventos()
    {
        return $this->belongsTo(Evento::class, 'id_evento');
    }
}
