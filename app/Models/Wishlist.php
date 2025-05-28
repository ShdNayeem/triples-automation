<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{

    protected $table = 'wishlist';
    protected $fillable = [
        'customer_id',
        'product_id'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }
    
    use HasFactory;
}
