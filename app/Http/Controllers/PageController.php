<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menus;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index($slug, Request $request)
    {
        $page = Page::where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$page) {
            abort(404);
        }

        return view('page', compact('page'));
    }

    public function preview($slug)
    {

        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            abort(404);
        }

        return view('page', compact('page'));
    }
}
