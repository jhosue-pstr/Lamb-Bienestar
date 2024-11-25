<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;  // Esto es importante para habilitar el uso de fábricas

    protected $table = 'citas';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'area',
        'estado',
        'motivo',
        'fecha',
        'hora',
        'estudiante_id', // Clave foránea hacia 'estudiantes'
    ];
}
