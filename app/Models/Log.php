<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    // Definir los campos que pueden ser asignados masivamente
    protected $guarded = ['id'];

    // Relación con la tabla Usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class); // Relación con el modelo Usuario
    }
}
