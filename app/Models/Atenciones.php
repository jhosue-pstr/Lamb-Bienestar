<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atenciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo_atencion',
        'tipo',
        'resposable',
        'fecha_atencion',
        'numero_derivaciones',
        'descripcion_motivo',
        'observaciones',
        'seguimiento_de_caso',
        'estado',
        'ingreso',
        'otros_datos',
        'estudiante_id',
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idEstudiante');
    }
}
