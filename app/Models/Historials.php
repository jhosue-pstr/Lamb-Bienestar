<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historials extends Model
{
    use HasFactory;

    // Si tu tabla usa un nombre plural no convencional, puedes definirlo así:
    protected $table = 'historials'; // Es opcional si Laravel ya reconoce el nombre de la tabla correctamente.

    public function estudiante()
    {
        // Suponiendo que la relación es de tipo 'belongsTo' (Historial pertenece a un Estudiante)
        return $this->belongsTo(Estudiantes::class, 'estudiantes_id');
    }

    /**
     * Relación con el modelo Atenciones (Historial pertenece a una atención)
     */
    public function atencion()
    {
        return $this->belongsTo(Atenciones::class, 'atenciones_id');
    }

    /**
     * Relación con el modelo Solicitudes (Historial pertenece a una solicitud)
     */
    public function solicitud()
    {
        return $this->belongsTo(Solicitudes::class, 'solicitudes_id');
    }

    /**
     * Relación con el modelo Becas (Historial pertenece a una beca)
     */
    public function beca()
    {
        return $this->belongsTo(Becas::class, 'becas_id');
    }
}
