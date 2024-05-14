<?php

namespace App\Filament\Resources\LostReportsResource\Pages;

use App\Filament\Resources\LostReportsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLostReports extends ListRecords
{
    protected static string $resource = LostReportsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
