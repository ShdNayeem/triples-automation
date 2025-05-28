<?php

namespace App\Filament\Resources\LandscapeResource\Pages;

use App\Filament\Resources\LandscapeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLandscapes extends ListRecords
{
    protected static string $resource = LandscapeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
