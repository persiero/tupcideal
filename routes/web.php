<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Wizard;


Route::get('/', function () {
    return view('landing');
});

// --- RUTA TEMPORAL PARA INSTALACIÓN EN RAILWAY ---
Route::get('/instalar-todo', function () {
    // 1. Ejecutar Seeders (Llenar base de datos)
    try {
        \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
        $seedMsg = "✅ Datos (Seeders) cargados correctamente.";
    } catch (\Exception $e) {
        $seedMsg = "❌ Error en seeders: " . $e->getMessage();
    }

    // 2. Crear Usuario Admin
    $email = 'admin@tupcideal.com';
    $password = 'admin123'; // <--- ESTA SERÁ TU CONTRASEÑA, CÁMBIALA SI QUIERES

    if (!\App\Models\User::where('email', $email)->exists()) {
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => $email,
            'password' => \Illuminate\Support\Facades\Hash::make($password),
        ]);
        $userMsg = "✅ Usuario creado: $email | Clave: $password";
    } else {
        $userMsg = "⚠️ El usuario ya existe, no se creó uno nuevo.";
    }

    return "<h1>Resultado de la Instalación:</h1><p>$seedMsg</p><p>$userMsg</p><br><a href='/sistema-interno'>Ir al Panel Admin</a>";
});