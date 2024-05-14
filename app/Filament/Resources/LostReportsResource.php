<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LostReportsResource\Pages;
use App\Filament\Resources\LostReportsResource\RelationManagers;
use App\Models\LostReports;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LostReportsResource extends Resource
{
    protected static ?string $model = LostReports::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //'departamento', 'cargo', 'destinatario', 'descripcion', 'date of foud','photo', 'personals_id', 'rooms_id'
                Forms\Components\TextInput :: make('departamento')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput :: make('cargo'),
                Forms\Components\TextInput :: make('destinatario'),
                Forms\Components\TextInput :: make('descripcion')
                ->required()
                ->maxLength(255),
                Forms\Components\DatePicker:: make('date of foud')
                ->required(),
                Forms\Components\TextInput :: make('photo'),
                Forms\Components\Select :: make('personals_id')
                ->relationship('personals','name')
                ->required()
                ->searchable()
                ->preload(),
                Forms\Components\Select :: make('rooms_id')
                ->relationship('rooms','rooms')
                ->required()
                ->searchable()
                ->preload(),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('departamento')->searchable(),
                TextColumn::make('cargo')->searchable(),
                TextColumn::make('destinatario')->searchable(),
                TextColumn::make('descripcion')->searchable(),
                TextColumn::make('date of foud')->date()->sortable(),
                TextColumn::make('photo')->searchable(),
                Tables\Columns\TextColumn::make('personals.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rooms.rooms')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListLostReports::route('/'),
            'create' => Pages\CreateLostReports::route('/create'),
            'edit' => Pages\EditLostReports::route('/{record}/edit'),
        ];
    }
}
