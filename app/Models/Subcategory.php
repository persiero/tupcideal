<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    use HasFactory;

    // 1. Permitir asignación masiva
    protected $fillable = [
        'category_id',
        'parent_id', // ¡Importante para la recursividad!
        'name',
        'description',
    ];

    // 2. Relación: Pertenece a una Categoría Principal (Ej: Estudios)
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // 3. Relación: Tiene un "Padre" (Ej: Arquitectura es hija de Universidad)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'parent_id');
    }

    // 4. Relación: Tiene "Hijos" (Ej: Universidad tiene hijos: Arquitectura, Derecho...)
    public function children(): HasMany
    {
        return $this->hasMany(Subcategory::class, 'parent_id');
    }
}
