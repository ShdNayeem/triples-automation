<?php

namespace App\Filament\Resources\ChilledwatersystemResource\Pages;

use App\Filament\Resources\ChilledwatersystemResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChilledwatersystems extends ListRecords
{
    protected static string $resource = ChilledwatersystemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
