<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RecommendationResource\Pages;
use App\Filament\Resources\RecommendationResource\RelationManagers;
use App\Models\Recommendation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Get;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RecommendationResource extends Resource
{
    protected static ?string $model = Recommendation::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    
    protected static ?string $navigationLabel = 'Recomendaciones';
    
    protected static ?string $modelLabel = 'Recomendación';
    
    protected static ?string $pluralModelLabel = 'Recomendaciones';
    
    protected static ?string $navigationGroup = 'Contenido';
    
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // 1. ¿Para qué perfil es esta regla?
            Select::make('subcategory_id')
                ->relationship('subcategory', 'name')
                ->label('Perfil / Subcategoría')
                ->searchable()
                ->preload()
                ->required(),

            // 2. ¿Qué componente estamos configurando?
            Select::make('component_type_id')
                ->relationship('componentType', 'name')
                ->label('Tipo de Componente')
                ->required()
                ->live() // ¡Reactivo! Actualiza los campos de abajo
                ->afterStateUpdated(function ($set) {
                    // Si cambia el tipo, reseteamos las selecciones de abajo
                    $set('min_spec_id', null);
                    $set('rec_spec_id', null);
                }),

            // 3. ¿A qué equipos aplica?
            Select::make('applicable_to')
                ->options([
                    'BOTH' => 'Ambos (PC y Laptop)',
                    'LAPTOP' => 'Solo Laptop',
                    'DESKTOP' => 'Solo PC Escritorio',
                ])
                ->default('BOTH')
                ->required()
                ->label('Aplica a'),

            // 4. Especificación Mínima (Filtrada)
            Select::make('min_spec_id')
                ->label('Requisito Mínimo')
                ->options(function (Get $get) {
                    $typeId = $get('component_type_id');
                    if (! $typeId) return []; // Si no hay tipo, lista vacía

                    // Buscamos specs que coincidan con el tipo seleccionado
                    return \App\Models\HardwareSpec::where('component_type_id', $typeId)
                        ->pluck('name', 'id');
                })
                ->searchable()
                ->required()
                ->disabled(fn (Get $get) => ! $get('component_type_id')), // Deshabilitado hasta elegir tipo

            // 5. Especificación Recomendada (Filtrada)
            Select::make('rec_spec_id')
                ->label('Requisito Recomendado')
                ->options(function (Get $get) {
                    $typeId = $get('component_type_id');
                    if (! $typeId) return [];

                    return \App\Models\HardwareSpec::where('component_type_id', $typeId)
                        ->pluck('name', 'id');
                })
                ->searchable()
                ->required()
                ->disabled(fn (Get $get) => ! $get('component_type_id')),

            // 6. Explicación para el usuario
            Textarea::make('reason')
                ->label('¿Por qué recomendamos esto?')
                ->placeholder('Ej: Necesario para renderizar en 3D fluido.')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('subcategory.name')
                ->label('Perfil')
                ->sortable()
                ->searchable()
                ->weight('bold'),

            TextColumn::make('componentType.name')
                ->label('Componente')
                ->badge(),

            TextColumn::make('minSpec.name')
                ->label('Mínimo')
                ->limit(30), // Corta el texto si es muy largo

            TextColumn::make('recSpec.name')
                ->label('Recomendado')
                ->limit(30)
                ->color('success'), // Color verde para resaltar
                
            TextColumn::make('applicable_to')
                ->label('Aplica'),
        ])
        ->filters([
            // Filtro por Perfil
            Tables\Filters\SelectFilter::make('subcategory_id')
                ->relationship('subcategory', 'name')
                ->label('Ver por Perfil'),
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
            'index' => Pages\ListRecommendations::route('/'),
            'create' => Pages\CreateRecommendation::route('/create'),
            'edit' => Pages\EditRecommendation::route('/{record}/edit'),
        ];
    }
}
