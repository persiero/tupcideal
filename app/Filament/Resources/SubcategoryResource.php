<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubcategoryResource\Pages;
use App\Filament\Resources\SubcategoryResource\RelationManagers;
use App\Models\Subcategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;

class SubcategoryResource extends Resource
{
    protected static ?string $model = Subcategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    
    protected static ?string $navigationLabel = 'Subcategorías';
    
    protected static ?string $modelLabel = 'Subcategoría';
    
    protected static ?string $pluralModelLabel = 'Subcategorías';
    
    protected static ?string $navigationGroup = 'Contenido';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // 1. SELECTOR DE CATEGORÍA (REACTIVO)
            Select::make('category_id')
                ->relationship('category', 'name')
                ->required()
                ->label('Categoría Principal')
                ->live() // <--- ¡LA CLAVE! Esto hace que el formulario "escuche" cambios
                ->afterStateUpdated(function (Set $set) {
                    // Si cambias de categoría, limpiamos el campo padre para evitar inconsistencias
                    $set('parent_id', null);
                }),

            // 2. SELECTOR DE PADRE (FILTRADO)
            Select::make('parent_id')
                ->label('Subcategoría Padre (Opcional)')
                ->relationship(
                    name: 'parent',
                    titleAttribute: 'name',
                    modifyQueryUsing: function (Builder $query, Get $get) {
                        // AQUÍ ESTÁ LA MAGIA:
                        // Solo mostramos subcategorías que pertenezcan a la categoría seleccionada arriba
                        return $query->where('category_id', $get('category_id'));
                    }
                )
                ->searchable()
                ->preload() // Carga las opciones para que la búsqueda sea rápida
                ->placeholder('Selecciona si es una especialidad (Ej: Arquitectura)')
                // Bloqueamos este campo hasta que seleccionen una categoría
                ->disabled(fn (Get $get) => ! $get('category_id')), 

            // 3. NOMBRE
            TextInput::make('name')
                ->required()
                ->maxLength(100)
                ->label('Nombre'),

            // 4. DESCRIPCIÓN
            Textarea::make('description')
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            // Nombre de la Subcategoría
            TextColumn::make('name')
                ->searchable()
                ->sortable()
                ->weight('bold'),

            // A qué categoría pertenece
            TextColumn::make('category.name') // Notación de punto mágica de Eloquent
                ->label('Categoría')
                ->sortable()
                ->badge(), // Le pone un colorcito de fondo estilo etiqueta

            // Quién es su padre (si tiene)
            TextColumn::make('parent.name')
                ->label('Padre')
                ->placeholder('- Principal -'), // Si está vacío pone esto
        ])
        ->filters([
            // Luego pondremos filtros aquí
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSubcategories::route('/'),
            'create' => Pages\CreateSubcategory::route('/create'),
            'edit' => Pages\EditSubcategory::route('/{record}/edit'),
        ];
    }
}
