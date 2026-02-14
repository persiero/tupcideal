<?php

namespace App\Filament\Widgets;

use App\Models\SimulationHistory;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestSimulations extends BaseWidget
{
    protected static ?int $sort = 3;
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                SimulationHistory::query()->latest()->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('tracking_code')
                    ->label('Código')
                    ->searchable()
                    ->copyable()
                    ->weight('bold'),
                
                Tables\Columns\TextColumn::make('user_selections')
                    ->label('Perfil')
                    ->getStateUsing(function ($record) {
                        $data = $record->user_selections;
                        if (is_string($data)) {
                            $data = json_decode($data, true);
                        }
                        if (!is_array($data)) return '-';
                        
                        $cat = $data['category'] ?? '?';
                        $sub = $data['subcategory'] ?? '?';
                        $mob = $data['mobility'] ?? '?';
                        
                        return "{$cat} ➤ {$sub} ({$mob})";
                    }),
                
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Servicio')
                    ->badge()
                    ->color(fn ($state) => $state ? 'success' : 'gray')
                    ->placeholder('Sin servicio'),
            ]);
    }
}
