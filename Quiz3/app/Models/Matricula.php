<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'nombre_estudiante',
        'correo_estudiante',
        'curso_id',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}