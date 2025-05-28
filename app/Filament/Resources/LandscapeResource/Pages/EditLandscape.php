<?php

namespace App\Filament\Resources\LandscapeResource\Pages;

use App\Filament\Resources\LandscapeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLandscape extends EditRecord
{
    protected static string $resource = LandscapeResource::class;

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
        return 'Landscape Image Updated';
    }
}
