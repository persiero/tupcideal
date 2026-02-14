<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recommendation extends Model
{
    use HasFactory;

    // Desactivamos timestamps si no los necesitamos, o los dejamos
    public $timestamps = false;

    protected $fillable = [
        'subcategory_id',
        'component_type_id',
        'min_spec_id',
        'rec_spec_id',
        'applicable_to', // BOTH, LAPTOP, DESKTOP
        'reason',
    ];

    // 1. Relación con la Subcategoría (Ej: Arquitectura)
    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class);
    }

    // 2. Relación con el Tipo de Componente (Ej: RAM)
    public function componentType(): BelongsTo
    {
        return $this->belongsTo(ComponentType::class);
    }

    // 3. Relación con la Especificación Mínima (Ej: 8GB)
    public function minSpec(): BelongsTo
    {
        return $this->belongsTo(HardwareSpec::class, 'min_spec_id');
    }

    // 4. Relación con la Especificación Recomendada (Ej: 16GB)
    public function recSpec(): BelongsTo
    {
        return $this->belongsTo(HardwareSpec::class, 'rec_spec_id');
    }
}
