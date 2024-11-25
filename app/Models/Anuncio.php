<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use HasFactory;

    protected $table = 'anuncios';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre',
        'ubicacion',
        'fecha',
        'hora',
        'descripcion',
        'afiche'
    ];
}
