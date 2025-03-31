<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Storage;
use Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'title',
        'slug',
        'feature_image',
        'excerpt',
        'author',
        'content',
        'status',
        'order_by',
        'publish_date',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'content' => 'json',
        'publish_date' => 'date',
    ];

    protected $appends = ['slug_url'];

    public function getSlugUrlAttribute()
    {
        return url($this->slug);
    }

    public function menu(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
      return  $this->belongsTo(Menus::class,'menu_id');
    }

    public function media()
    {
        return $this->belongsToMany(AppMedia::class, 'page_media', 'page_id', 'media_id');
    }

    protected static function boot()
{
    parent::boot();

    static::deleting(function ($page) {
        // Delete the featured image
        if ($page->feature_image && Storage::disk('public')->exists($page->feature_image)) {
            Storage::disk('public')->delete($page->feature_image);
        }

        // Delete images from the `content` JSON field
        if (is_array($page->content)) {
            foreach ($page->content as $block) {
                if (isset($block['url']) && Storage::disk('public')->exists($block['url'])) {
                    Storage::disk('public')->delete($block['url']);
                }
            }
        }

        // Delete images from the `file-manager/page/image` directory
        $imageFiles = Storage::disk('public')->files('file-manager/page/image');
        foreach ($imageFiles as $image) {
            if (Str::contains($image, $page->id)) { // Optionally filter files by page ID
                Storage::disk('public')->delete($image);
            }
        }

        // Delete images from the `file-manager/page/images` directory
        $multipleImageFiles = Storage::disk('public')->files('file-manager/page/images');
        foreach ($multipleImageFiles as $image) {
            if (Str::contains($image, $page->id)) { // Optionally filter files by page ID
                Storage::disk('public')->delete($image);
            }
        }
    });
}

}