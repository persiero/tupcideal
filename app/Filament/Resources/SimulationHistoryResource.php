<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SimulationHistoryResource\Pages;
use App\Filament\Resources\SimulationHistoryResource\RelationManagers;
use App\Models\SimulationHistory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SimulationHistoryResource extends Resource
{
    protected static ?string $model = SimulationHistory::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    
    protected static ?string $navigationLabel = 'Historial';
    
    protected static ?string $modelLabel = 'Simulación';
    
    protected static ?string $pluralModelLabel = 'Historial de Simulaciones';
    
    protected static ?string $navigationGroup = 'Análisis';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('created_at')
                ->dateTime()
                ->label('Fecha')
                ->sortable(),
            
            TextColumn::make('tracking_code')
                ->label('Código')
                ->searchable()
                ->copyable()
                ->weight('bold'),

            TextColumn::make('user_selections')
                ->label('Resumen del Pedido')
                ->getStateUsing(function ($record) {
                    $data = $record->user_selections;
                    
                    // Si es string, decodificar manualmente
                    if (is_string($data)) {
                        $data = json_decode($data, true);
                    }
                    
                    if (!is_array($data)) return '-';
                    
                    $cat = $data['category'] ?? '?';
                    $sub = $data['subcategory'] ?? '?';
                    $mob = $data['mobility'] ?? '?';
                    
                    return "{$cat} ➤ {$sub} ({$mob})";
                })
                ->wrap(),
            // -----------------------------
            
            TextColumn::make('service.name')
                ->label('Servicio Interesado')
                ->placeholder('Sin selección') // Si no clicó nada
                ->badge()
                ->color(fn ($state) => $state ? 'success' : 'gray'),
            
            TextColumn::make('client_ip')
                ->label('IP')
                ->toggleable(isToggledHiddenByDefault: true),
        ])
        ->defaultSort('created_at', 'desc')
        ->actions([
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSimulationHistories::route('/'),
            //'create' => Pages\CreateSimulationHistory::route('/create'),
            //'edit' => Pages\EditSimulationHistory::route('/{record}/edit'),
        ];
    }
}
