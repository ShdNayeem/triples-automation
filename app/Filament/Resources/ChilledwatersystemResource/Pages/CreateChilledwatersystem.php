<?php

namespace App\Filament\Resources\ChilledwatersystemResource\Pages;

use App\Filament\Resources\ChilledwatersystemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateChilledwatersystem extends CreateRecord
{
    protected static string $resource = ChilledwatersystemResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Chilled Water System Image Created';
    }
}
