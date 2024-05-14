<?php

namespace App\Filament\Resources\LostResource\Pages;

use App\Filament\Resources\LostResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLost extends EditRecord
{
    protected static string $resource = LostResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
