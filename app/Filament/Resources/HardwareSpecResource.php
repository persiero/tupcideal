<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HardwareSpecResource\Pages;
use App\Filament\Resources\HardwareSpecResource\RelationManagers;
use App\Models\HardwareSpec;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HardwareSpecResource extends Resource
{
    protected static ?string $model = HardwareSpec::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    
    protected static ?string $navigationLabel = 'Especificaciones';
    
    protected static ?string $modelLabel = 'Especificación';
    
    protected static ?string $pluralModelLabel = 'Especificaciones';
    
    protected static ?string $navigationGroup = 'Configuración';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // 1. ¿Qué tipo de pieza es?
            Select::make('component_type_id')
                ->relationship('type', 'name') // Usa la relación 'type'
                ->required()
                ->label('Tipo de Componente')
                ->preload()
                ->searchable(),

            // 2. Nombre del Modelo
            TextInput::make('name')
                ->required()
                ->maxLength(150)
                ->label('Modelo (Ej: Core i5 13400)'),

            // 3. Puntaje de Rendimiento (Clave para tu sistema)
            TextInput::make('score')
                ->numeric()
                ->required()
                ->default(0)
                ->minValue(0)
                ->maxValue(100)
                ->label('Puntaje de Rendimiento (0-100)')
                ->helperText('Usa 10 para gama baja, 50 media, 90+ extrema'),

            // 4. Precio Referencial (Opcional)
            TextInput::make('price_estimate')
                ->numeric()
                ->prefix('S/')
                ->label('Precio Referencial'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('type.name') // Muestra "Procesador" en vez del ID
                ->label('Tipo')
                ->sortable()
                ->badge(),

            TextColumn::make('name')
                ->searchable()
                ->weight('bold'),

            TextColumn::make('score')
                ->label('Puntos')
                ->sortable()
                ->alignCenter(),
                
            TextColumn::make('price_estimate')
                ->money('PEN') // Formatea como S/ 1,200.00
                ->label('Precio'),
        ])
        ->filters([
            // Filtro para ver solo Procesadores, solo RAM, etc.
            Tables\Filters\SelectFilter::make('component_type_id')
                ->relationship('type', 'name')
                ->label('Filtrar por Tipo'),
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
            'index' => Pages\ListHardwareSpecs::route('/'),
            'create' => Pages\CreateHardwareSpec::route('/create'),
            'edit' => Pages\EditHardwareSpec::route('/{record}/edit'),
        ];
    }
}
