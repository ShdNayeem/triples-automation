<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Chilledwatersystem extends Model implements HasMedia, Sortable
{
    use HasFactory, InteractsWithMedia, SortableTrait;

    protected $table = 'chilledwatersystems';

    protected $fillable = [
        'title',
        'image_id'

    ];

    public $sortable = [
        'order_column_name' => 'image_id',
        'sort_when_creating' => true,
    ];

    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaCollection('chilledwatersystems');
    }
}
