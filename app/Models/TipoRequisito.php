<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoRequisito extends Model
{
    use HasFactory;

    protected $table = 'tipo_requisitos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'idFichaSocioEconomica',
        'idTipoBeca'
    ];


    // Si el modelo no tiene un campo 'id' como clave primaria, puedes especificarlo aquí
    protected $primaryKey = 'id';

    public function fichaSocioEconomica()
    {
        return $this->belongsTo(FichaSocioEconomica::class, 'idFichaSocioEconomica');
    }
}
