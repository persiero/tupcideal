<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ComponentType;
use App\Models\HardwareSpec;
use App\Models\Recommendation;
use App\Models\SupportService;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        // ==========================================
        // 1. CATEGORÍAS PRINCIPALES
        // ==========================================
        $catEstudios = Category::create(['name' => 'Estudios', 'description' => 'Para estudiantes de colegio, universidad o postgrado.']);
        $catTrabajo = Category::create(['name' => 'Trabajo / Profesional', 'description' => 'Para entornos laborales, oficina y productividad.']);
        $catGamer = Category::create(['name' => 'Gaming', 'description' => 'Para jugar videojuegos desde casual hasta competitivo.']);
        $catCreativo = Category::create(['name' => 'Creación de Contenido', 'description' => 'Edición de video, diseño gráfico, streaming.']);

        // ==========================================
        // 2. SUBCATEGORÍAS (PERFILES)
        // ==========================================
        
        // --- Estudios ---
        $subEscolar = Subcategory::create(['category_id' => $catEstudios->id, 'name' => 'Escolar / Básica', 'description' => 'Word, Excel, Navegación web, Zoom.']);
        $subIngenieria = Subcategory::create(['category_id' => $catEstudios->id, 'name' => 'Ingeniería / Arquitectura', 'description' => 'AutoCAD, Revit, Civil 3D, Matlab.']);
        $subDiseno = Subcategory::create(['category_id' => $catEstudios->id, 'name' => 'Diseño Gráfico', 'description' => 'Photoshop, Illustrator, InDesign.']);

        // --- Trabajo ---
        $subOficina = Subcategory::create(['category_id' => $catTrabajo->id, 'name' => 'Oficina / Administrativo', 'description' => 'Correo, Office avanzado, Contabilidad.']);
        $subProgramacion = Subcategory::create(['category_id' => $catTrabajo->id, 'name' => 'Programación / Desarrollo', 'description' => 'VS Code, Docker, Máquinas Virtuales.']);

        // --- Gamer ---
        $subEsports = Subcategory::create(['category_id' => $catGamer->id, 'name' => 'E-Sports (Competitivo)', 'description' => 'Dota 2, LoL, Valorant, CS:GO.']);
        $subTripleA = Subcategory::create(['category_id' => $catGamer->id, 'name' => 'Juegos Triple A (Calidad Alta)', 'description' => 'Cyberpunk, GTA VI, Call of Duty, God of War.']);

        // --- Creativo ---
        $subVideo = Subcategory::create(['category_id' => $catCreativo->id, 'name' => 'Edición de Video / Render', 'description' => 'Premiere Pro, After Effects, DaVinci Resolve.']);
        $subStreaming = Subcategory::create(['category_id' => $catCreativo->id, 'name' => 'Streaming (Jugar + Transmitir)', 'description' => 'OBS, Twitch + Juego pesado simultáneo.']);


        // ==========================================
        // 3. TIPOS DE COMPONENTES
        // ==========================================
        $typeCpu = ComponentType::create(['name' => 'Procesador', 'slug' => 'cpu']);
        $typeRam = ComponentType::create(['name' => 'Memoria RAM', 'slug' => 'ram']);
        $typeGpu = ComponentType::create(['name' => 'Tarjeta de Video', 'slug' => 'gpu']);
        $typeStorage = ComponentType::create(['name' => 'Almacenamiento', 'slug' => 'storage']);


        // ==========================================
        // 4. HARDWARE SPECS (INVENTARIO)
        // ==========================================

        // --- CPUs ---
        $cpuEntry = HardwareSpec::create(['component_type_id' => $typeCpu->id, 'name' => 'Core i3 / Ryzen 3 (Gama Entrada)', 'score' => 30, 'price_estimate' => 450.00]);
        $cpuMid = HardwareSpec::create(['component_type_id' => $typeCpu->id, 'name' => 'Core i5 / Ryzen 5 (Gama Media)', 'score' => 60, 'price_estimate' => 850.00]);
        $cpuHigh = HardwareSpec::create(['component_type_id' => $typeCpu->id, 'name' => 'Core i7 / Ryzen 7 (Gama Alta)', 'score' => 85, 'price_estimate' => 1400.00]);
        $cpuExtreme = HardwareSpec::create(['component_type_id' => $typeCpu->id, 'name' => 'Core i9 / Ryzen 9 (Tope de Gama)', 'score' => 100, 'price_estimate' => 2200.00]);

        // --- RAM ---
        $ram8 = HardwareSpec::create(['component_type_id' => $typeRam->id, 'name' => '8GB DDR4/DDR5', 'score' => 20, 'price_estimate' => 120.00]);
        $ram16 = HardwareSpec::create(['component_type_id' => $typeRam->id, 'name' => '16GB DDR4/DDR5 (Estándar actual)', 'score' => 50, 'price_estimate' => 250.00]);
        $ram32 = HardwareSpec::create(['component_type_id' => $typeRam->id, 'name' => '32GB DDR5 (Profesional)', 'score' => 80, 'price_estimate' => 500.00]);

        // --- GPU (Video) ---
        $gpuIntegrated = HardwareSpec::create(['component_type_id' => $typeGpu->id, 'name' => 'Gráficos Integrados (Básico)', 'score' => 10, 'price_estimate' => 0.00]);
        $gpuEntry = HardwareSpec::create(['component_type_id' => $typeGpu->id, 'name' => 'NVIDIA RTX 3050 / RX 6600', 'score' => 40, 'price_estimate' => 1100.00]);
        $gpuMid = HardwareSpec::create(['component_type_id' => $typeGpu->id, 'name' => 'NVIDIA RTX 4060 / RX 7600', 'score' => 65, 'price_estimate' => 1600.00]);
        $gpuHigh = HardwareSpec::create(['component_type_id' => $typeGpu->id, 'name' => 'NVIDIA RTX 4070 Ti / RX 7900 XT', 'score' => 90, 'price_estimate' => 3500.00]);

        // --- Storage ---
        $ssd500 = HardwareSpec::create(['component_type_id' => $typeStorage->id, 'name' => 'SSD 500GB NVMe', 'score' => 50, 'price_estimate' => 200.00]);
        $ssd1tb = HardwareSpec::create(['component_type_id' => $typeStorage->id, 'name' => 'SSD 1TB NVMe Gen4', 'score' => 80, 'price_estimate' => 350.00]);


        // ==========================================
        // 5. REGLAS DE RECOMENDACIÓN (LA INTELIGENCIA)
        // ==========================================

        // REGLA: Arquitectura (Necesita CPU fuerte y Gráfica decente)
        Recommendation::create([
            'subcategory_id' => $subIngenieria->id,
            'component_type_id' => $typeCpu->id,
            'min_spec_id' => $cpuMid->id, // Mínimo i5
            'rec_spec_id' => $cpuHigh->id, // Recomendado i7
            'applicable_to' => 'BOTH',
            'reason' => 'El renderizado de planos en Revit y AutoCAD consume mucho procesador mononúcleo.'
        ]);
        Recommendation::create([
            'subcategory_id' => $subIngenieria->id,
            'component_type_id' => $typeGpu->id,
            'min_spec_id' => $gpuEntry->id, // Mínimo 3050
            'rec_spec_id' => $gpuMid->id, // Recomendado 4060
            'applicable_to' => 'BOTH',
            'reason' => 'Necesaria para visualizar modelos 3D fluidamente en el viewport.'
        ]);

        // REGLA: Gamer E-Sports (Necesita FPS, CPU rápido, Gráfica media)
        Recommendation::create([
            'subcategory_id' => $subEsports->id,
            'component_type_id' => $typeCpu->id,
            'min_spec_id' => $cpuMid->id,
            'rec_spec_id' => $cpuMid->id,
            'applicable_to' => 'DESKTOP',
            'reason' => 'Juegos como Valorant o CS:GO dependen más del procesador.'
        ]);
        Recommendation::create([
            'subcategory_id' => $subEsports->id,
            'component_type_id' => $typeGpu->id,
            'min_spec_id' => $gpuEntry->id,
            'rec_spec_id' => $gpuMid->id,
            'applicable_to' => 'DESKTOP',
            'reason' => 'Suficiente para jugar a más de 144 FPS en 1080p.'
        ]);

        // REGLA: Oficina (Básico)
        Recommendation::create([
            'subcategory_id' => $subOficina->id,
            'component_type_id' => $typeCpu->id,
            'min_spec_id' => $cpuEntry->id,
            'rec_spec_id' => $cpuMid->id,
            'applicable_to' => 'BOTH',
            'reason' => 'Para multitarea con Chrome y Excel pesado.'
        ]);
        Recommendation::create([
            'subcategory_id' => $subOficina->id,
            'component_type_id' => $typeRam->id,
            'min_spec_id' => $ram8->id,
            'rec_spec_id' => $ram16->id,
            'applicable_to' => 'BOTH',
            'reason' => '8GB es el mínimo hoy en día, 16GB asegura fluidez futura.'
        ]);


        // ==========================================
        // 6. SERVICIOS DE NEGOCIO
        // ==========================================
        SupportService::create([
            'name' => 'Asesoría Express (30 min)',
            'description' => 'Revisión rápida de tu cotización o dudas puntuales por videollamada.',
            'price' => 25.00,
            'is_active' => true
        ]);

        SupportService::create([
            'name' => 'Búsqueda de Proveedores',
            'description' => 'Te entrego los links de compra más baratos y seguros para tu hardware.',
            'price' => 45.00,
            'is_active' => true
        ]);

        SupportService::create([
            'name' => 'Servicio de Armado y Configuración',
            'description' => 'Armado profesional, gestión de cables e instalación de Windows/Drivers.',
            'price' => 120.00,
            'is_active' => true
        ]);
    }
}
