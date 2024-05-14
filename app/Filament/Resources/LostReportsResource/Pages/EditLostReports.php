<?php

namespace App\Filament\Resources\LostReportsResource\Pages;

use App\Filament\Resources\LostReportsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLostReports extends EditRecord
{
    protected static string $resource = LostReportsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
