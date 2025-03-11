<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','email'];

    //relacion de uno a muchos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
