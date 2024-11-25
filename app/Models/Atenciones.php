<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atenciones extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivoAtencion',
        'tipo',
        'responsable',
        'fechaAtencion',
        'descripcionMotivo',
        'lesionObservaciones',
        'seguimientoCaso',
        'otrosDatos',
        'idEstudiante',
    ];


    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'idAtencion');}
}
