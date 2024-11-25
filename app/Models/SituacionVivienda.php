<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionVivienda extends Model
{
    use HasFactory;

    protected $table = 'situacion_vivienda';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'departamento',
        'provincia',
        'distrito',
        'direccion',
        'referencia',
        'tenenciaDomicilio',
        'servicioComplementarioBienes',
        'tipoVivienda',
        'materialConstruccion',
        'servicioBasico',
        'servicioComplementario',
        'numeroPisos',
        'numeroHabitaciones',
        'areaResidencia',
        'bienes',
        'vehiculo',
        'modelo',
        'año',
    ];
}
