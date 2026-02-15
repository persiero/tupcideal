<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Wizard;


Route::get('/', function () {
    return view('landing');
});

Route::get('/reinicio-total', function () {
    // 1. Borrar toda la BD y volver a crearla desde cero con datos limpios
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', [
            '--seed' => true,
            '--force' => true
        ]);
        $dbMsg = "✅ Base de datos reiniciada y limpia (Sin duplicados).";
    } catch (\Exception $e) {
        return "❌ Error en base de datos: " . $e->getMessage();
    }

    // 2. Crear tu Usuario Admin ÚNICO
    $email = 'admin@tupcideal.com';
    $password = 'admin123';

    try {
        // Borramos si existiera (aunque migrate:fresh ya lo hizo) y creamos
        \App\Models\User::create([
            'name' => 'Admin Percy',
            'email' => $email,
            'password' => \Illuminate\Support\Facades\Hash::make($password),
        ]);
        $userMsg = "✅ Usuario Admin creado correctamente.";
    } catch (\Exception $e) {
        $userMsg = "⚠️ El usuario ya existía por el seeder.";
    }

    // 3. Limpiar caché para asegurar login
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');

    return "<h1>Mantenimiento Completado</h1>
            <p>$dbMsg</p>
            <p>$userMsg</p>
            <p>Usuario: <b>$email</b></p>
            <p>Clave: <b>$password</b></p>
            <br>
            <a href='/sistema-interno'>👉 IR AL LOGIN AHORA</a>";
});