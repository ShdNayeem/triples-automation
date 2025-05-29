<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\Video;
use App\Models\Slider;
use App\Models\Channel;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Subcategory;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    
    protected static bool $isLazy = false;

    protected static ?string $pollingInterval = '10s';

    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        return [
            //            
            // Stat::make('Banner Videos',  Video::count())
            // ->description('Count')
            // ->descriptionIcon('heroicon-o-rectangle-stack')
            // ->color('success'),
            Stat::make('Sliders',  Slider::count())
            ->description('Count')
            ->descriptionIcon('heroicon-o-clipboard-document-list')
            ->color('success'),
            // Stat::make('Channels',  Channel::count())
            // ->description('Count')
            // ->descriptionIcon('heroicon-o-users')
            // ->color('success'),
            
            Stat::make('Total no. of orders',  Order::count())
            ->description('Count')
            ->descriptionIcon('heroicon-o-shopping-bag')
            ->color('success')
            ->chart([7, 2, 10, 3, 15, 4, 17]),
            Stat::make('Order',  Order::where('status', true)->count())
            ->description('Completed')
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->color('success'),
            Stat::make('Order Status Pending',  Order::where('status', false)->count())
            ->description('Pending')
            ->descriptionIcon('heroicon-m-arrow-trending-down')
            ->color('danger'),
            Stat::make('Products',  Product::count())
            ->description('Count')
            ->descriptionIcon('heroicon-o-shopping-cart')
            ->color('success'),
            Stat::make('Category',  Category::count())
            ->description('Count')
            ->descriptionIcon('heroicon-o-rectangle-stack')
            ->color('success'),
            // Stat::make('SubCategory',  Subcategory::count())
            // ->description('Count')
            // ->descriptionIcon('heroicon-o-clipboard-document-list')
            // ->color('success'),
            Stat::make('Customer',  Customer::count())
            ->description('Count')
            ->descriptionIcon('heroicon-o-users')
            ->color('success'),
        ];
    }
}
