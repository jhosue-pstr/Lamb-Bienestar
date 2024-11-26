<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FichaSocioEconomica extends Model
{
    use HasFactory;

    protected $table = 'ficha_socio_economica';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'idEconomiaFamiliar',
        'idSituacionVivienda',
        'idSituacionSalud',
        'idEstudiante',
    ];

    // Relación con 'EconomiaFamiliar'
    public function economiaFamiliar()
    {
        return $this->belongsTo(EconomiaFamiliar::class, 'idEconomiaFamiliar');
    }

    // Relación con 'SituacionVivienda'
    public function situacionVivienda()
    {
        //return $this->belongsTo(situacionVivienda::class, 'idSituacionVivienda');
    }

    // Relación con 'SituacionSalud'
    public function situacionSalud()
    {
       // return $this->belongsTo(situacionSalud::class, 'idSituacionSalud');
    }

    // Relación con 'Estudiantes'
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idEstudiante');
    }
}
