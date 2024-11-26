<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    use HasFactory;

    protected $table = 'documentos';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'idEstudiante',
        'idFichaSocioEconomica',
        'idSolicitud',
    ];

    // Relación con el modelo Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idEstudiante');
    }

    // Relación con el modelo FichaSocioEconomica
    public function fichaSocioEconomica()
    {
        return $this->belongsTo(FichaSocioEconomica::class, 'idFichaSocioEconomica');
    }

    // Relación con el modelo Solicitud
    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class, 'idSolicitud');
    }
}
