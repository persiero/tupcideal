<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupportServiceResource\Pages;
use App\Filament\Resources\SupportServiceResource\RelationManagers;
use App\Models\SupportService;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupportServiceResource extends Resource
{
    protected static ?string $model = SupportService::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    
    protected static ?string $navigationLabel = 'Servicios';
    
    protected static ?string $modelLabel = 'Servicio';
    
    protected static ?string $pluralModelLabel = 'Servicios';
    
    protected static ?string $navigationGroup = 'Contenido';
    
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
                ->label('Nombre del Servicio')
                ->required(),

            Textarea::make('description')
                ->label('Descripción corta'),

            TextInput::make('price')
                ->label('Precio (S/)')
                ->numeric()
                ->prefix('S/')
                ->required(),

            Toggle::make('is_active')
                ->label('Disponible para venta')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('name')->weight('bold'),
            TextColumn::make('price')->money('PEN')->label('Precio'),
            ToggleColumn::make('is_active')->label('Activo'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSupportServices::route('/'),
            'create' => Pages\CreateSupportService::route('/create'),
            'edit' => Pages\EditSupportService::route('/{record}/edit'),
        ];
    }
}
