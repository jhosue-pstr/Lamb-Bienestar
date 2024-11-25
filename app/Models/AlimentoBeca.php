<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlimentoBeca extends Model
{

    use HasFactory;
    protected $table = 'alimento_becas';
    protected $fillable = ['descripcion', 'estado', 'idTipoBeca'];
}

