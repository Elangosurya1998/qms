<?php

use App\Http\Controllers\PageController;
use App\Models\Menus;
use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

if (Schema::hasTable('pages')) {
    $pages = Page::select('id', 'slug', 'menu_id')->get();
  
    // Generate hierarchical routes
    $routes = [];

    foreach ($pages as $page) {

        $parentMenu = $page->menu?->parent;
        
        $routePath = Str::slug($parentMenu?->name) .'/'. $page->slug; // Generate full path
        
        $routes[$routePath] = $page;
    }

    // Define dynamic routes
    foreach ($routes as $path => $page) {
        Route::get($path, [PageController::class, 'common'])->name("pages.$page->slug");
    }
}