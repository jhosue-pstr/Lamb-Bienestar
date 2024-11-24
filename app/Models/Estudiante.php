<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estudiante extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'estudiantes'; // Nombre de la tabla en la BD
    protected $fillable = ['codigo', 'nombre', 'apellidoPaterno', 'apellidoMaterno', 'dni', 'escuela', 'facultad'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function citas()
{
    return $this->hasMany(Cita::class);
}
}
