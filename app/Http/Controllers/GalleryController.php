<?php

namespace App\Http\Controllers;

use App\Models\PhotoGallery;
use App\Models\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $galleries = PhotoGallery::where('status', 1)
            ->orderBy('order_by', 'asc')
            ->get();

        return view('pages.galleries', compact('galleries'));
    }

    public function show(Request $request, $slug)
    {
        $gallery = PhotoGallery::where('slug', $slug)
            ->where('status', 1)
            ->first();

        return view('pages.gallery-view', compact('gallery'));
    }


}
