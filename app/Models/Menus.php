<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Menus extends Model
{
    use HasFactory,HasSlug;

    protected $table = 'menus';

    protected $fillable = [
        'type',
        'name',
        'slug',
        'is_url',
        'url',
        'target',
        'locations',
        'excerpt',
        'image',
        'status',
        'order_by',
        'parent_id',
        'publish_date',
        'publish_time',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'locations' => 'array',
        'publish_date' => 'date',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Menus::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Menus::class, 'parent_id')
            ->orderBy('order_by', 'asc');
    }

    public function page(): HasOne
    {
        return $this->hasOne(Page::class, 'menu_id');
    }

//    /**
//     * Locations that this menu belongs to.
//     */
//    public function locations(): BelongsToMany
//    {
//        return $this->belongsToMany(MenuLocation::class, 'menu_menu_location', 'menu_id', 'menu_location_id');
//    }
}
