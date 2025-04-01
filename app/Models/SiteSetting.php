<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'homepage_id',
        'email',
        'phone',
        'address',
        'description',
        'certifications',
        'social_links',
        'meta',
    ];


    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'social_links' => 'array',
        'certifications' => 'array',
        'meta' => 'array',
    ];

    /**
     * Relation to the Page model for the homepage.
     */
    public function homePage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Page::class, 'homepage_id');
    }

}
