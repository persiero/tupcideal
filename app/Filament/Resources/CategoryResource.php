<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    
    protected static ?string $navigationLabel = 'Categorías';
    
    protected static ?string $modelLabel = 'Categoría';
    
    protected static ?string $pluralModelLabel = 'Categorías';
    
    protected static ?string $navigationGroup = 'Contenido';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Campo para el Nombre
            TextInput::make('name')
                ->required()
                ->maxLength(50)
                ->label('Nombre de la Categoría'),

            // Campo para la Descripción
            Textarea::make('description')
                ->label('Descripción (Opcional)'),

            // Campo para el Ícono (Emoji)
            TextInput::make('icon')
                ->maxLength(50)
                ->label('Ícono (Emoji)')
                ->placeholder('Ej: 📚, 💼, 🎮')
                ->helperText('Usa un emoji que represente esta categoría'),

            // Switch para Activo/Inactivo
            Toggle::make('is_active')
                ->label('¿Está visible?')
                ->default(true),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            // Columna ID
            TextColumn::make('id')
                ->sortable(),

            // Columna Ícono
            TextColumn::make('icon')
                ->label('Ícono')
                ->default('💼'),

            // Columna Nombre
            TextColumn::make('name')
                ->searchable() // ¡Esto agrega una barra de búsqueda gratis!
                ->sortable(),

            // Columna Activo (Switch directo en la tabla)
            ToggleColumn::make('is_active')
                ->label('Visible'),
            
            // Fecha de creación
            TextColumn::make('created_at')
                ->dateTime()
                ->label('Creado'),
        ])
        ->filters([
            // Aquí podríamos poner filtros después
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
