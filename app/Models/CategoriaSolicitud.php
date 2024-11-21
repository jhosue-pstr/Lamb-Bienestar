<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaSolicitud extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
