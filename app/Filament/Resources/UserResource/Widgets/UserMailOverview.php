<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\Widget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class UserMailOverview extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';

    protected function getCards(): array
    {
        
    $name = auth()->user()->name;
    $email = auth()->user()->email;
    // dd($email);
        return [ 
            Card::make('Name', $name)
                        ->description('Admin')                        
                        ->descriptionIcon('heroicon-s-user-circle')
                        ->color('success'),
            Card::make('Email', $email)
                        ->description('Admin')                        
                        ->descriptionIcon('heroicon-o-user-circle')
                        ->color('danger'),
        ];
    }
}