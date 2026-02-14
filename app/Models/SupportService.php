<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportService extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'is_active'];

    // Casteamos el precio para operaciones matemáticas si fuera necesario
    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
