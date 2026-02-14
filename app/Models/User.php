<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // 3. AGREGAR ESTA FUNCIÓN DE SEGURIDAD
    public function canAccessPanel(Panel $panel): bool
    {
        // AQUÍ DEFINES LAS REGLAS:
        
        // Opción A: Solo tú (por tu correo exacto)
        // return $this->email === 'percy.rojas@admin.com';

        // Opción B: Solo correos corporativos (Ej: @miempresa.com)
        // return str_ends_with($this->email, '@miempresa.com');

        // Opción C (Recomendada para empezar): Una lista blanca de correos
        return in_array($this->email, [
            'percy.rojas@admin.com',
            'soporte@admin.com',
            'gerencia@admin.com',
        ]);
    }

}
