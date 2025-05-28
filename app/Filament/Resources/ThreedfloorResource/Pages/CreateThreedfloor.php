<?php

namespace App\Filament\Resources\ThreedfloorResource\Pages;

use App\Filament\Resources\ThreedfloorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateThreedfloor extends CreateRecord
{
    protected static string $resource = ThreedfloorResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationTitle(): ?string
    {
        return '3D Floor Image Created';
    }
}
