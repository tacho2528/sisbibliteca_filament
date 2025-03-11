<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $fillable = [

        'titulo',
        'autor',
        'editorial',
        'cantidad',

    ];

    //relacion de uno a muchos
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}
