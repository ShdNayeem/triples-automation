<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia; 

class Category extends Model implements HasMedia
{
    use HasFactory,  InteractsWithMedia;

    protected $fillable = ['name', 'slug','description'];

    protected $table = 'category';

    public function subcategories()
    {

        return $this->hasMany(Subcategory::class);
    }
    public function products(){

        return $this->hasMany(Product::class);
    }

}

