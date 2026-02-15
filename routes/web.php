<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Wizard;


Route::get('/', function () {
    return view('landing');
});

Route::get('/diagnostico-login', function () {
    // 1. Borrar toda la caché (Importante en Railway)
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
    
    $email = 'admin@tupcideal.com';
    $password = 'admin123';
    
    // 2. Buscar al usuario
    $user = \App\Models\User::where('email', $email)->first();
    
    echo "<h1>Diagnóstico de Login</h1>";
    echo "Running on: " . app()->environment() . "<br>";
    
    if (!$user) {
        return "<h2 style='color:red'>❌ El usuario NO existe en la base de datos.</h2>";
    }
    
    echo "<h2 style='color:green'>✅ El usuario SÍ existe (ID: {$user->id})</h2>";
    
    // 3. Verificar si la contraseña coincide matemáticamente
    if (\Illuminate\Support\Facades\Hash::check($password, $user->password)) {
        echo "<h2 style='color:green'>✅ La contraseña es CORRECTA (Matemáticamente)</h2>";
        
        // 4. Intentar loguear manualmente
        if (\Illuminate\Support\Facades\Auth::attempt(['email' => $email, 'password' => $password])) {
            return "<h2 style='color:green'>🎉 ¡Login exitoso! El sistema te ha autenticado. <br> <a href='/sistema-interno'>Ir al Panel ahora</a></h2>";
        } else {
            return "<h2 style='color:orange'>⚠️ La contraseña coincide, pero Auth::attempt falló. Revisa si el usuario está activo o bloqueado.</h2>";
        }
    } else {
        // Si no coincide, la forzamos de nuevo
        $user->password = \Illuminate\Support\Facades\Hash::make($password);
        $user->save();
        return "<h2 style='color:red'>❌ La contraseña NO coincidía. <br>🔧 SE HA FORZADO UNA NUEVA CONTRASEÑA AHORA MISMO.<br>Recarga esta página para probar de nuevo.</h2>";
    }
});