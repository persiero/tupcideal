<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComponentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', // Ej: Procesador
        'slug', // Ej: cpu
    ];
    
    // Desactivamos los timestamps si no los pusiste en la migración, 
    // pero en el script final sí los pusimos, así que esto es opcional.
    public $timestamps = false;
}
