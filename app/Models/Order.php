<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = ['product_id', 'customer_id', 'order_payment_id', 'method', 'quantity', 'currency', 'user_email', 'amount', 'discount_value','status', 'json_response'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }

}
