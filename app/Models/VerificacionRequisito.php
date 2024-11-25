<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificacionRequisito extends Model
{
    use HasFactory;

    protected $table = 'verificacion_requisitos';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'idSolicitud',
        'idRequisito',
        'cumplido',
        'observaciones',
    ];

    // Relación con el modelo Solicitud
    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'idSolicitud');
    }

    // Relación con el modelo TipoRequisito
    // public function requisito()
    // {
    //     return $this->belongsTo(TipoRequisito::class, 'idRequisito');
    // }
}
