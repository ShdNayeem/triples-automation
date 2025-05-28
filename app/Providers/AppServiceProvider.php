<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Offer;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    // public function boot(): void
    // {
        
    //     // $this->app->bind('path.public', function() {
    //     //     return base_path().'/../public_html';
    //     // });
    // }

    public function boot()
{
    View::composer('*', function ($view) {
        $offers = Offer::orderBy('created_at', 'desc')->take(5)->get();
        $view->with('automationOffers', $offers);
    });
}
}
