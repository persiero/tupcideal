<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HardwareSpec extends Model
{
    use HasFactory;

    protected $fillable = [
        'component_type_id',
        'name',
        'score', // Puntaje de rendimiento (0-100)
        'price_estimate', // Precio referencial
    ];

    // Relación: Una pieza pertenece a un Tipo
    public function type(): BelongsTo
    {
        return $this->belongsTo(ComponentType::class, 'component_type_id');
    }
}
