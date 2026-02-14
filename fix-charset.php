<?php
// Script temporal para verificar el problema de charset
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\SimulationHistory;

echo "=== VERIFICANDO REGISTROS ===\n\n";

$records = SimulationHistory::all();

foreach ($records as $record) {
    echo "ID: {$record->id} | Código: {$record->tracking_code}\n";
    echo "JSON RAW: " . $record->getRawOriginal('user_selections') . "\n";
    echo "Array: " . print_r($record->user_selections, true) . "\n";
    echo "---\n";
}

echo "\n¿Quieres ELIMINAR todos los registros corruptos? (s/n): ";
$handle = fopen("php://stdin", "r");
$line = fgets($handle);
if(trim($line) == 's'){
    SimulationHistory::truncate();
    echo "✅ Registros eliminados. Prueba hacer una nueva simulación.\n";
} else {
    echo "❌ No se eliminó nada.\n";
}
fclose($handle);
