<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LugarNacimiento extends Model
{
    use HasFactory;

    protected $table = 'lugar_nacimientos';

    protected $fillable = [
        'departamento',
        'provincia',
        'distrito'
    ];
}
