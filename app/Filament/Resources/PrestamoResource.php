<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestamoResource\Pages;
use App\Filament\Resources\PrestamoResource\RelationManagers;
use App\Models\Prestamo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

//use Filament\Forms\Components\Select;

//use Filament\Support\Services\RelationshipJoiner;
//use Illuminate\Database\Eloquent\Relations\Relation;

class PrestamoResource extends Resource
{
    protected static ?string $model = Prestamo::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';                  //icono del dasboard

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Select::make('estudiante_id')
                    ->label('Estudiante')
                    ->relationship('estudiante','nombre')
                    ->searchable()                                                  //permite buscar dentro del select
                    ->preload()                                                     //para ver lo que se esta buscando
                    ->required(),                                                   //verifica que sea requerido el campo
                Forms\Components\Select::make('libro_id')
                    ->label('Libro')
                    ->relationship('libro','titulo')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make('fecha_prestamo')
                    ->required(),
                Forms\Components\DatePicker::make('fecha_devolucion')
                    ->required(),
                Forms\Components\TextInput::make('estado')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('estudiante.nombre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('libro.titulo')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_prestamo')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_devolucion')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPrestamos::route('/'),
            'create' => Pages\CreatePrestamo::route('/create'),
            'edit' => Pages\EditPrestamo::route('/{record}/edit'),
        ];
    }
}
