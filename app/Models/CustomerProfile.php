<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;
    protected $table = 'customer_profile';
    protected $fillable = [

        'customer_id',
        'mobile',
        'door_no',
        'street',
        'pincode',
        'area',
        'city',
        'state',
        'country',
        // 'GST',


    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }


}
