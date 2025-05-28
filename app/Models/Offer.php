<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'product_name',
        'description',
        'discount',
        'image',
        'start_date',
        'end_date'
    ];
    
    use HasFactory;
}
