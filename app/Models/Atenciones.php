<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atenciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo de atencion',
        'tipo',
        'resposable',
        'fecha atencion',
        'numero derivaciones',
        'descripcion motivo',
        'observaciones',
        'seguimiento de caso',
        'estado',
        'ingreso',
        'otros datos',
        'estudiante_id',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiantes::class, 'estudiante_id');
    }

    public function cita()
    {
        return $this->belongsTo(Cita::class, 'idCitas');
    }

    public function historiales()
    {
        return $this->hasMany(Historials::class, 'atenciones_id');
    }
}
