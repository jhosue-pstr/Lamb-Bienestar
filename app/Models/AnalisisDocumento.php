<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalisisDocumento extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    // Relación con la tabla Usuarios
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con la tabla Estados
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
