<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    use HasFactory;

    protected $appends = ['type'];

    protected $fillable = [
        'type',
        'name',
        'is_url',
        'url',
        'target',
        'status',
        'order_by',
        'parent_id',
        'created_at',
        'updated_at'
    ];

    public function getTypeAttribute(): string
    {
        return $this->attributes['type'] == 'main_menu' ? 'Main Menu' : 'Sub Menu';
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Menus::class, 'parent_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Menus::class, 'parent_id')->where('status', 1)->orderBy('order_by', 'asc');
    }

    public function page(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Page::class, 'menu_id');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($menu) {
    //         // Check if the menu has child menus
    //         if ($menu->children()->count() > 0) {
    //             throw new \Exception("This menu has submenus and cannot be deleted.");
    //         }

    //         // Check if the menu is referred to by a page
    //         if ($menu->page()->exists()) {
    //             throw new \Exception("This menu is referenced by a page and cannot be deleted.");
    //         }
    //     });
    // }
}