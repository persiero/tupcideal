<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryIconSeeder extends Seeder
{
    public function run(): void
    {
        $icons = [
            'Estudios' => '📚',
            'Trabajo y Oficina' => '💼',
            'Hogar y uso básico' => '🏠',
            'Gaming' => '🎮',
            'Diseño y Creación' => '🎨',
            'Livianas y fáciles de transportar' => '🎒',
            'Máxima potencia profesional' => '⚡',
        ];

        foreach ($icons as $name => $icon) {
            Category::where('name', $name)->update(['icon' => $icon]);
        }
    }
}
