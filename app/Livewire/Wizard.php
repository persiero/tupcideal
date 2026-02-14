<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Recommendation;
use App\Models\SimulationHistory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Request;
use App\Models\SupportService;

class Wizard extends Component
{
    // VARIABLES DE ESTADO (Guardar lo que elige el usuario)
    public $step = 1; // Empezamos en el paso 1
    
    public $selectedCategoryId = null;
    public $selectedSubcategoryId = null;
    public $mobilityPreference = null; // LAPTOP, DESKTOP, BOTH

    // VARIABLES DE DATOS (Listas para mostrar)
    public $categories = [];
    public $subcategories = [];
    public $recommendations = [];

    public $trackingCode = null; // Aquí guardaremos el código (Ej: REC-A1B2)

    // CUANDO ARRANCA EL COMPONENTE
    public function mount()
    {
        // Cargamos las categorías activas
        $this->categories = Category::where('is_active', true)->get();
    }

    // ACCIÓN: Seleccionar Categoría (Paso 1 -> 2)
    public function selectCategory($id)
    {
        $this->selectedCategoryId = $id;
        
        // Buscamos subcategorías "padres" (Nivel 1) de esa categoría
        $this->subcategories = Subcategory::where('category_id', $id)
            ->whereNull('parent_id') // Solo las principales (Ej: Universidad)
            ->get();

        $this->step = 2; // Avanzamos
    }

    // ACCIÓN: Seleccionar Subcategoría (Paso 2 -> 3)
    public function selectSubcategory($id)
    {
        // Verificamos si esta subcategoría tiene hijos (Ej: Universidad -> Arquitectura)
        $children = Subcategory::where('parent_id', $id)->get();

        if ($children->count() > 0) {
            // Si tiene hijos, nos quedamos en el paso 2 pero mostramos los hijos
            $this->subcategories = $children;
        } else {
            // Si ya es el nivel final (Ej: Arquitectura), guardamos y avanzamos
            $this->selectedSubcategoryId = $id;
            $this->step = 3; // Vamos a preguntar Laptop vs Desktop
        }
    }

    // ACCIÓN: Seleccionar Movilidad (Paso 3 -> 4 FINAL)
    public function selectMobility($type)
    {
        $this->mobilityPreference = $type;
        $this->generateReport();
        $this->step = 4;
    }

    // LÓGICA FINAL: Generar Reporte
    public function generateReport()
    {
        // Buscamos las reglas que coincidan con el perfil seleccionado
        // Y filtramos por movilidad (Si pidió Laptop, buscamos reglas BOTH o LAPTOP)
        
        $query = Recommendation::where('subcategory_id', $this->selectedSubcategoryId)
            ->with(['componentType', 'minSpec', 'recSpec']); // Cargamos relaciones para no hacer 1000 consultas

        if ($this->mobilityPreference !== 'BOTH') {
            $query->whereIn('applicable_to', ['BOTH', $this->mobilityPreference]);
        }

        $this->recommendations = $query->get();

        // 2. GUARDADO DE HISTORIAL (CORREGIDO)
        if (!$this->trackingCode) { 
            $this->trackingCode = 'REC-' . strtoupper(Str::random(6));
            
            // Buscamos los nombres con seguridad. Si falla, ponemos texto de error para detectar por qué.
            $catName = Category::find($this->selectedCategoryId)?->name ?? 'Error-Cat';
            $subName = Subcategory::find($this->selectedSubcategoryId)?->name ?? 'Error-Sub';
            $mobPref = $this->mobilityPreference ?? 'Error-Mob';

            SimulationHistory::create([
                'tracking_code' => $this->trackingCode,
                'user_selections' => [
                    'category' => $catName,
                    'subcategory' => $subName,
                    'mobility' => $mobPref,
                ],
                'client_ip' => Request::ip(),
            ]);
        }
    }

    // Función para generar el link de WhatsApp personalizado
    public function getWhatsappUrlProperty()
    {
        // 1. Datos básicos
        $perfil = Subcategory::find($this->selectedSubcategoryId)?->name ?? 'General';
        $tipoEquipo = match($this->mobilityPreference) {
            'LAPTOP' => 'una Laptop',
            'DESKTOP' => 'una PC de Escritorio',
            default => 'un Equipo (Laptop o PC)',
        };

        // 2. Construimos el mensaje
        $mensaje = "👋 Hola, mi código de recomendación es: *{$this->trackingCode}*\n"; // <--- AGREGADO
        $mensaje .= "*Mi Perfil:* {$perfil}\n";
        $mensaje .= "*Busco:* {$tipoEquipo}\n\n";
        $mensaje .= "El sistema me recomienda:\n";

        // 3. Listamos los componentes clave (CPU, RAM, Video)
        foreach($this->recommendations as $rec) {
            $componente = $rec->componentType->name;
            $modelo = $rec->recSpec->name;
            $mensaje .= "- {$componente}: {$modelo}\n";
        }

        $mensaje .= "\n✅ *Quisiera cotizar este equipo o recibir asesoría.*";

        // 4. Codificamos para URL (cambia espacios por %20, etc.)
        // REEMPLAZA '51999999999' POR TU NÚMERO REAL
        $numero = '51915391298'; 
        return "https://wa.me/{$numero}?text=" . urlencode($mensaje);
    }

    public function selectServiceAndRedirect($serviceId)
    {
        // 1. Buscamos el registro que acabamos de crear usando el código de seguimiento
        $history = SimulationHistory::where('tracking_code', $this->trackingCode)->first();
        
        if ($history) {
            // 2. Guardamos el servicio que le interesó
            $history->update([
                'interested_service_id' => $serviceId
            ]);
        }

        // 3. Generamos el link específico para ese servicio
        $serviceName = SupportService::find($serviceId)->name;
        $whatsappLink = $this->whatsappUrl . "&text=" . urlencode(" Me interesa el servicio: " . $serviceName);

        // 4. Redireccionamos a WhatsApp
        return redirect()->away($whatsappLink);
    }

    public function getServicesProperty()
    {
        return SupportService::where('is_active', true)->get();
    }

    // Utilidad para volver atrás
    public function restart()
    {
        $this->reset();
        $this->mount();
    }

    public function render()
    {
        return view('livewire.wizard');
    }
}
