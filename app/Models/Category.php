<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    // Aquí le decimos a Eloquent: "Puedes llenar estos campos automáticamente"
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ];

    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class);
    }
}
