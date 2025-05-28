<?php

namespace App\Filament\Resources\LandscapeResource\Pages;

use App\Filament\Resources\LandscapeResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLandscape extends CreateRecord
{
    protected static string $resource = LandscapeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Landscape Image Created';
    }
}
