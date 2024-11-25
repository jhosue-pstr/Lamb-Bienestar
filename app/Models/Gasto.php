<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    protected $table = 'gastos';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'vivienda',
        'alimentacion',
        'educacion',
        'movilidad',
        'salud',
        'otrosGastos',
        'pagoServicio',
        'otros',
        'datoAdicional', // Columna adicional de texto
    ];

}
