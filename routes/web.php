<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

URL::forceScheme('https');

// Homepage route
Route::get('/', function () {
    $page = SiteSetting::first()->homepage;
    return view('page', compact('page'));
})->name('home');

// Post routes
Route::get('post/{slug}', [PostController::class, 'index'])->name('post.index');
Route::get('preview/post/{slug}', [PostController::class, 'preview'])->name('post.preview');
Route::get('news-and-events', [PostController::class, 'newsAndEvents'])->name('news-and-events');

// Galleries routes
Route::get('galleries', [GalleryController::class, 'index'])->name('galleries.index'); // List all galleries
Route::get('gallery/{slug}', [GalleryController::class, 'show'])->name('galleries.show'); // Show gallery details

// Preview specific pages
Route::get('preview/{slug}', [PageController::class, 'preview'])->name('pages.preview');

// Catch-all route for web pages
Route::get('{slug}', [PageController::class, 'index'])->name('pages.index');
