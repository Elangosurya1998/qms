<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class PhotoGallery extends Model
{
    use HasFactory, HasSlug;

     protected $casts = [
         'images' => 'array',
     ];

     protected $appends = ['thumbnails', 'slug_url'];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'images',
        'status',
        'order_by',
        'publish_date',
        'created_at',
        'updated_at'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getSlugUrlAttribute()
    {
        return '';
    }

    public function getThumbnailsAttribute()
    {
        if (is_array($this->images) && count($this->images) > 0) {
            // Get a random image
            $randomImage = $this->images[array_rand($this->images)];

            // Extract the file name for alt text
            $fileName = pathinfo($randomImage, PATHINFO_FILENAME);

            return [
                'url' => $randomImage,
                'alt' => $fileName, // Use the file name as the alt text
            ];
        }

        return null;

    }
}
