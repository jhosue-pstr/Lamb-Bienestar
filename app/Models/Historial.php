<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historial';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'idAtencion',
        'idCita',
        'idEstudiante',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idEstudiante');
    }

    public function atencion()
    {
        return $this->belongsTo(Atenciones::class, 'idAtencion');
    }

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'solicitudes_id');
    }

    public function beca()
    {
        return $this->belongsTo(Beca::class, 'becas_id');
    }

}
