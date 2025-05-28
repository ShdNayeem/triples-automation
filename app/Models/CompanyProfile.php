<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia; 

class CompanyProfile extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'company_profile';

    protected $fillable = ['email_1','email_2','door_no', 'street', 'pincode', 'slug', 'description', 'price',
     'area', 'city', 'state',
     'country',
     'mobile_1',
     'mobile_2',
     'landline_1',
     'landline_2',
     'GST',
     'website',
     'googleBusiness',
     'facebook',
     'youtube',
     'linkedin',
     'twitter',
     'instagram',
     
    ];
    
}
