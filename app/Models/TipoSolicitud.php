<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoSolicitud extends Model
{
    use HasFactory;

        protected $guarded = ['id'];

        public function categoria()
        {
            return $this->belongsTo(CategoriaSolicitud::class);
        }

        // Relación con la tabla Estados
        public function estado()
        {
            return $this->belongsTo(Estado::class);
        }

        public function requisitos()
    {
        return $this->belongsToMany(TipoRequisito::class, 'requisito_tipo_solicitud', 'tipo_solicitud_id', 'requisito_id')
                    ->withPivot('es_obligatorio', 'notas'); // Incluye los metadatos adicionales
    }
}
