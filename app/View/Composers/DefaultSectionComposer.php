<?php

namespace App\View\Composers;

use App\Models\Menus;
use App\Models\PhotoGallery;
use App\Models\Post;
use App\Models\SiteSetting;
use App\Models\Testimonials;
use Illuminate\View\View;

class DefaultSectionComposer
{
    public function compose(View $view)
    {
        $testimonials = Testimonials::latest()->take(10)->get();

        $flashNews = Post::whereHas('categories', function ($query) {
            $query->where('slug', 'flash-news');
        })->latest()->take(5)->get();

        $newsAndEvents = Post::whereHas('categories', function ($query) {
            $query->where('slug', 'news-events');
        })->latest()->take(5)->get();

        $gallery = PhotoGallery::latest()->take(8)->get();

        // Pass the retrieved data to the view
        $view->with([
            'testimonials' => $testimonials,
            'flashNews' => $flashNews,
            'newsAndEvents' => $newsAndEvents,
            'gallery' => $gallery,
        ]);

    }

}
