<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    // Opcional: Define la tabla si su nombre no sigue la convención plural
    protected $table = 'eventos';
}
