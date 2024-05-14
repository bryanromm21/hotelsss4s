<?php

namespace App\Filament\Resources\LostResource\Pages;

use App\Filament\Resources\LostResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLosts extends ListRecords
{
    protected static string $resource = LostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
