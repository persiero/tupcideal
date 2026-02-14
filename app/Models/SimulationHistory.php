<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SimulationHistory extends Model
{
    use HasFactory;

    protected $table = 'simulation_history'; // Aseguramos el nombre correcto

    protected $fillable = [
        'tracking_code',
        'user_selections',
        'interested_service_id',
        'client_ip'
    ];

    // ¡Truco! Laravel convertirá automáticamente el JSON a Array y viceversa
    protected $casts = [
        'user_selections' => 'array',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(SupportService::class, 'interested_service_id');
    }
}
