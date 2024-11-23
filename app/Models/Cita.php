<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;  // Esto es importante para habilitar el uso de fábricas

    protected $fillable = [
        'area',
        'estado',
        'motivo',
        'fecha',
        'hora',
        'atenciones_id',
        'estudiante_id',
    ];
}
