<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamiliaresEstudiantes extends Model
{
    use HasFactory; // Asegúrate de tener esta línea

    protected $fillable = [
        'nombre', 'edad', 'correo', 'direccion', 'telefono', 'parentesco',
    ];

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'familiares_estudiantes_id');
    }
}
