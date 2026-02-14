<?php

namespace App\Filament\Resources;

use Illuminate\Support\Str;
use App\Filament\Resources\ComponentTypeResource\Pages;
use App\Filament\Resources\ComponentTypeResource\RelationManagers;
use App\Models\ComponentType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ComponentTypeResource extends Resource
{
    protected static ?string $model = ComponentType::class;

    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    
    protected static ?string $navigationLabel = 'Tipos de Componente';
    
    protected static ?string $modelLabel = 'Tipo de Componente';
    
    protected static ?string $pluralModelLabel = 'Tipos de Componente';
    
    protected static ?string $navigationGroup = 'Configuración';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->label('Nombre del Tipo')
                ->required()
                ->maxLength(50)
                ->live(onBlur: true) // Escucha cuando terminas de escribir
                ->afterStateUpdated(function (Set $set, $state) {
                    // Auto-genera el slug: "Tarjeta de Video" -> "tarjeta-de-video"
                    $set('slug', Str::slug($state));
                }),

            TextInput::make('slug')
                ->required()
                ->maxLength(50)
                ->unique(ignoreRecord: true) // No permite duplicados
                ->readOnly(), // Para que no lo modifiquen a mano
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('id')->sortable(),
            TextColumn::make('name')->searchable()->sortable(),
            TextColumn::make('slug')->badge(), // Estilo visual bonito
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
            'index' => Pages\ListComponentTypes::route('/'),
            'create' => Pages\CreateComponentType::route('/create'),
            'edit' => Pages\EditComponentType::route('/{record}/edit'),
        ];
    }
}
