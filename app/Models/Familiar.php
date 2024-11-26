<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    use HasFactory;

    protected $table = 'familiares';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'apellido',
        'estadoCivil',
        'gradoInstruccion',
        'ocupacion',
        'edad',
        'correo',
        'direccion',
        'telefono',
        'parentesco',
        'enfermedad',
    ];
}
