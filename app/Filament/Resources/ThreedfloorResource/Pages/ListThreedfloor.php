<?php

namespace App\Filament\Resources\ThreedfloorResource\Pages;

use App\Filament\Resources\ThreedfloorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThreedfloor extends ListRecords
{
    protected static string $resource = ThreedfloorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
