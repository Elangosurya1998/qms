<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $page = SiteSetting::first()->homepage;
    return view('page', compact('page'));
});

Route::get('{slug}', [PageController::class,'index'])->name('pages.index');
Route::get('preview/page/{slug}', [PageController::class,'preview'])->name('preview.page');

Route::get('post/{slug}', [PostController::class,'index'])->name('post.index');
Route::get('preview/post/{slug}', [PageController::class,'preview'])->name('preview.post');
