<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRequisito extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tiposDeSolicitud()
    {
        return $this->belongsToMany(TipoSolicitud::class, 'requisito_tipo_solicitud', 'requisito_id', 'tipo_solicitud_id')
                    ->withPivot('es_obligatorio', 'notas');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
