<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atenciones extends Model
{
    use HasFactory; // Asegúrate de tener esta línea

    protected $fillable = [
        'motivo de atencion', 'tipo', 'resposable', 'fecha atencion', 'numero derivaciones',
        'descripcion motivo', 'observaciones', 'seguimiento de caso', 'otros datos'
    ];

    public function estudiantes()
    {
        return $this->belongsTo(Estudiantes::class, 'estudiante_id');
    }
}
