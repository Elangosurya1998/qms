@props([
    'type' => null,
    'title' => null,
])

@if( $type == 'testimonials')
    <x-testimonials
        :id="Str::random(5)"
        :title="$title"
        :carouselItems="$testimonials"
    />
@endif

@if( $type == 'flash_news' )
    <x-flash-news
        :id="Str::random(5)"
        :title="$title"
        :flashNews="$flashNews"
    />
@endif

@if( $type == 'news_and_events' )
    <x-news-and-events
        :id="Str::random(5)"
        :title="$title"
        :newsAndEvents="$newsAndEvents"
        :view="true"
    />
@endif

@if( $type == 'gallery' )
    <x-gallery
        :id="Str::random(5)"
        :title="$title"
        :galleries="$gallery"
        :view="true"
    />
@endif




