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

        return view('frontend.post', compact('post'));
    }

    public function preview(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)
            ->first();

        if (!$post) {
            abort(404);
        }

        return view('frontend.post', compact('post'));
    }


}
