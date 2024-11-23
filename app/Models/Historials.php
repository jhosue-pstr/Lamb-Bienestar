<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historials extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo',
        'descripcion',
        'estudiantes_id',
        'numero_atenciones',
        'id_cita',
        'solicitudes_id',
        'becas_id',
    ];

    protected $table = 'historials';

    public function estudiante()
    {
        // Suponiendo que la relación es de tipo 'belongsTo' (Historial pertenece a un Estudiante)
        return $this->belongsTo(Estudiantes::class, 'estudiantes_id');
    }

    public function atencion()
    {
        return $this->belongsTo(Atenciones::class, 'atenciones_id');
    }

    public function solicitud()
    {
        return $this->belongsTo(Solicitudes::class, 'solicitudes_id');
    }

    public function beca()
    {
        return $this->belongsTo(Becas::class, 'becas_id');
    }


}
