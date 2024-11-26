<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;


    protected $table = 'solicitudes';

    protected $fillable = [
        'tipo',
        'idEstudiante',
        'idBeca',
        'idAlimentoBeca',
    ];

    // Relación con el modelo Estudiante
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idEstudiante');
    }

    // Relación con el modelo Beca
    public function beca()
    {
        return $this->belongsTo(Beca::class, 'idBeca');
    }

    // Relación con el modelo AlimentoBeca
    public function alimentoBeca()
    {
        return $this->belongsTo(AlimentoBeca::class, 'idAlimentoBeca');
    }
}
