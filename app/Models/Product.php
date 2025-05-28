<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Component;
use Spatie\MediaLibrary\HasMedia;
use Spatie\EloquentSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model implements HasMedia, Sortable
{
    use HasFactory, InteractsWithMedia, SortableTrait;

    protected $table = 'product';

    protected $fillable = ['category_id', 'subcategory_id', 'title', 'slug', 'description', 'price', 'offer_price', 'product_attachments', 'available_size', 'product_id', 'is_published'];

    public $sortable = [
        'order_column_name' => 'product_id',
        'sort_when_creating' => true,
    ];

    public function component()
    {
        return $this->belongsToMany(Component::class, 'product_component')->withTimestamps()->withPivot('format_id');
    }

    public function ProductComponent(): HasMany
    {
        return $this->hasMany(ProductComponent::class);

    }
    // public function format()
    // {
    //     return $this->belongsToMany(Format::class, 'product_format')->withTimestamps();
    // }
    protected $casts = [
        'available_size' => 'array',
        'is_published' => 'boolean',
        'products' => 'array',
        // 'product_attachments' => 'array',
    ];

    // public function products()
    // {
    //     return $this->hasMany(Product::class);
    // }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function subcategory()
    {

        return $this->belongsTo(Subcategory::class);
    }

    public function orders()
    {

        return $this->hasMany(Order::class);
    }
    
}
