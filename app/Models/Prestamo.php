<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'libro_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'estado',
    ];

    //relacion uno a uno
    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
    
    //relacion uno a uno 
    public function libro()
    {
        return $this->belongsTo(libro::class);
    }
    
}
