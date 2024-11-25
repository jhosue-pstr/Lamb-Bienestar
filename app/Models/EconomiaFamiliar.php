<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EconomiaFamiliar extends Model
{
    use HasFactory;
    protected $table = 'economia_familiar';

    // Definir las columnas que pueden ser asignadas masivamente
    protected $fillable = [
        'dependeEconomicamente',
        'cuantosAportan',
        'quienesAportan',
        'idGasto', // Clave foránea a la tabla 'gastos'
    ];
}
