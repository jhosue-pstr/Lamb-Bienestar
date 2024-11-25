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

    public function atencion()
    {
        return $this->belongsTo(Atenciones::class, 'idAtencion');
    }

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'idCita');
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idEstudiante');
    }

}
