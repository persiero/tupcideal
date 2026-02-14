<?php

namespace App\Filament\Widgets;

use App\Models\SimulationHistory;
use App\Models\Category;
use App\Models\Recommendation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalSimulations = SimulationHistory::count();
        $todaySimulations = SimulationHistory::whereDate('created_at', today())->count();
        $withService = SimulationHistory::whereNotNull('interested_service_id')->count();
        $conversionRate = $totalSimulations > 0 ? round(($withService / $totalSimulations) * 100, 1) : 0;

        return [
            Stat::make('Total Simulaciones', $totalSimulations)
                ->description('Usuarios que usaron el recomendador')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 12, 15, 18, 22, 25, $todaySimulations]),
            
            Stat::make('Hoy', $todaySimulations)
                ->description('Simulaciones de hoy')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),
            
            Stat::make('Conversión', $conversionRate . '%')
                ->description($withService . ' usuarios interesados en servicios')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('warning'),
        ];
    }
}
