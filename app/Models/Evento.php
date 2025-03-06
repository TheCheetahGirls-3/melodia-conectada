<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'evento';
    protected $primaryKey = 'id_evento';
    public $timestamps = false;

    /**
     * The roles that belong to the Evento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function musicos()
    {
        return $this->belongsToMany(Musico::class, 'contrato', 'id_evento', 'id_usuario')
                    ->withPivot('fecha_inicio', 'fecha_fin');
    }

    /**
     * Get the local that owns the Evento
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function local()
    {
        return $this->belongsTo(local::class, 'id_usuario');
    }
}
