<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Gallery;
use App\Models\CompanyProfile;
use Spatie\MediaLibrary\MediaCollections\Models\Media;



use Illuminate\Support\Facades\View;
// use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        $categories = Category::with('subcategories','products')->get();
        View::share('categories', $categories);

        $products = Product::with('category','subcategory')->get();
        View::share('products', $products);
        
        $gallery = Gallery::all();
        View::share('gallery', $gallery);
        
        $profile =  CompanyProfile::first();
        
            $image = Media::where('model_type', CompanyProfile::class)
                              ->where('model_id', $profile->id)
                              ->where('collection_name', 'logo')
                              ->first();
            if ($image) {
                $logo = $image->getFullUrl();
            } else {
                // Set a default image path if no image is found
                $logo = '/assets/img/logo.png';
            }                 
           $signature =   Media::where('model_type', CompanyProfile::class)
           ->where('model_id', $profile->id)
           ->where('collection_name', 'signature')
           ->first();   
           if($signature)
           {
                $sign = $signature->getFullUrl();
           } else
           {
                $sign = '/assets/img/logo.png';
           }
         
        View::share(['logo' => $logo, 'profile' => $profile,'sign' => $sign]);
        
        $services = Category::latest()->get();
        View::share('services', $services);

    }
}
