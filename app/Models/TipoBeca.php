<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBeca extends Model
{
    use HasFactory;
    protected $table = 'tipo_becas';

    protected $fillable = ['nombre', 'detalle'];

    public function tipoRequisito()
    {
        return $this->belongsTo(TipoRequisito::class, 'idTipoRequisito','beca_id','beca_requisito');
    }

    public function requisitos()
    {
        // Define la relación muchos a muchos con el modelo TipoRequisito
        return $this->belongsToMany(TipoRequisito::class, 'beca_requisito', 'beca_id', 'requisito_id');
    }
}
