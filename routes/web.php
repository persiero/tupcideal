<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Wizard;


Route::get('/', function () {
    return view('landing');
});

Route::get('/rescate-admin', function () {
    $email = 'admin@tupcideal.com';
    $password = 'admin123'; // <--- Contraseña asegurada

    $user = \App\Models\User::where('email', $email)->first();

    if ($user) {
        // Si existe, le cambiamos la clave a la fuerza
        $user->password = \Illuminate\Support\Facades\Hash::make($password);
        $user->save();
        return "✅ Contraseña RESTABLECIDA exitosamente.<br>Usuario: $email<br>Clave: $password";
    } else {
        // Si no existe (por si acaso), lo creamos
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => $email,
            'password' => \Illuminate\Support\Facades\Hash::make($password),
        ]);
        return "✅ Usuario CREADO exitosamente.<br>Usuario: $email<br>Clave: $password";
    }
});