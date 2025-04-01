<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class MenuLocation extends Model
{
    use HasFactory,HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Menus that belong to a location.
     */
    public function menus(): BelongsToMany
    {
        return $this->belongsToMany(Menus::class, 'menu_menu_location', 'menu_location_id', 'menu_id');
    }

}
