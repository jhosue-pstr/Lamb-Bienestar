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
        return $this->belongsTo(TipoRequisito::class, 'idTipoRequisito');
    }
}
