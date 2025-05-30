<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Customer extends Authenticatable
{
    use HasFactory;

    protected $table = 'customer';
    protected $fillable = [
        'name',
        'email',
        'password',
         'gauth_id',
        'gauth_type'

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
     protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function profile()
    {
        return $this->hasOne(CustomerProfile::class, 'customer_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
