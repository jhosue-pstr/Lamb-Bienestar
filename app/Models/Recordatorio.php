<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recordatorio extends Model
{
    use HasFactory;

    protected $table = 'recordatorios';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'tipo',
        'nombre',
        'ubicacion',
        'fecha',
        'hora',
        'descripcion'
    ];
}
