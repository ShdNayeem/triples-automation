<?php

namespace App\Filament\Resources\ChilledwatersystemResource\Pages;

use App\Filament\Resources\ChilledwatersystemResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChilledwatersystem extends EditRecord
{
    protected static string $resource = ChilledwatersystemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
    protected function getSavedNotificationTitle(): ?string
    {
        return 'Chilled Water System Image Updated';
    }
}
