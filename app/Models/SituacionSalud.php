<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacionSalud extends Model
{
    use HasFactory;
    protected $table = 'situacion_salud';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'salud',
        'observaciones',
        'atencionEnfermedad',
        'seguro',
        'enfermedadPermanente',
        'nombreEnfermedad',
        'familiarEnfermo',
    ];
}
