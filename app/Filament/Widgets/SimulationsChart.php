<?php

namespace App\Filament\Widgets;

use App\Models\SimulationHistory;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class SimulationsChart extends ChartWidget
{
    protected static ?string $heading = 'Simulaciones por Día';
    
    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = Trend::model(SimulationHistory::class)
            ->between(
                start: now()->subDays(7),
                end: now(),
            )
            ->perDay()
            ->count();

        return [
            'datasets' => [
                [
                    'label' => 'Simulaciones',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(99, 102, 241, 0.1)',
                    'borderColor' => 'rgb(99, 102, 241)',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
