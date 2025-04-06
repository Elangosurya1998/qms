<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 1)
            ->first();

        if (!$post) {
            abort(404);
        }

        return view('post', compact('post'));
    }

    public function preview(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)
            ->first();

        if (!$post) {
            abort(404);
        }

        return view('post', compact('post'));
    }

    public function newsAndEvents(Request $request){
        $newsAndEvents = Post::whereHas('categories', function ($query) {
            $query->where('slug', 'news-events');
        })
            ->where('status', 1)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('pages.news-events', compact('newsAndEvents'));
    }


}
