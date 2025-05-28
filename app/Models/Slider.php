<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Slider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'sliders';

    protected $fillable = [
        'content',
        'title',
        'url'

    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaCollection('sliders');
    }
}
