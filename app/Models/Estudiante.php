<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudiante extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
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

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }

        public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
