<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $table = 'estudiantes';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'codigo',
        'nombre',
        'apellidoPaterno',
        'apellidoMaterno',
        'edad',
        'direccion',
        'sexo',
        'facultad',
        'escuela',
        'telefono',
        'dni',
        'ciclo',
        'correo',
        'estadoCivil',
        'fechaNacimiento',
        'domicilio',
        'idLugarNacimiento'];


}
