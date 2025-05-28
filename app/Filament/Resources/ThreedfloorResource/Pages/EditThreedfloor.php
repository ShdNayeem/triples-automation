<?php

namespace App\Filament\Resources\ThreedfloorResource\Pages;

use App\Filament\Resources\ThreedfloorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThreedfloor extends EditRecord
{
    protected static string $resource = ThreedfloorResource::class;

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
        return '3D Floor Image Updated';
    }
}
