<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoomResource\Pages;
use App\Filament\Resources\RoomResource\RelationManagers;
use App\Models\Room;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('rooms')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('rooms_number')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('rooms_price')
                    ->required()
                    ->numeric(),
                    Forms\Components\Select::make('rooms_type')
                    ->options([
                        'marimonial' => 'Matrimonial',
                        'individual' => 'Individual',
                        'doble' => 'Doble',
                    ]),
                Forms\Components\TextInput::make('capacity')
                    ->required()
                    ->numeric(),
                    Forms\Components\Select::make('state')
                    ->multiple()
                    ->options([
                        'limpio'=>'Limpio',
                        'sucio'=>'Sucio',
                        'mantenimiento'=>'Mantenimiento',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('rooms')
                    ->numeric()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('rooms_price')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('rooms_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('capacity')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('state')
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
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
