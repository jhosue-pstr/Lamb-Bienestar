<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'apellido', 'edad', 'direccion', 'codigo', 'sexo', 'facultad', 'escuela',
        'telefono', 'DNI', 'ciclo', 'correo', 'estado civil', 'fecha de nacimiento', 'domicilio',
        'familiares_estudiantes_id', 'atenciones_id',
    ];

    public function familiarEstudiante()
    {
        return $this->belongsTo(FamiliaresEstudiantes::class, 'familiares_estudiantes_id');
    }

    public function atencion()
    {
        return $this->hasMany(Atenciones::class);
    }

    public function historiales()
    {
        return $this->hasMany(Historials::class, 'estudiantes_id');
    }
}
