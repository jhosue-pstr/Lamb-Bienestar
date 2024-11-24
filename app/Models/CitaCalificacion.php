<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitaCalificacion extends Model
{
    use HasFactory;
    protected $table = 'cita_calificaciones';

    protected $fillable = [
        'cita_id',
        'calificacion',
        'comentario',
    ];

    // Relación con la cita
    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }
}
