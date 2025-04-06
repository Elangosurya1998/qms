@section('title', 'News and Events' )
<x-main-layout>
    <x-hero
        title="News and Events"
        description="Stay updated with the latest news and upcoming events happening in our community."
        :hero="[
            'type' => 'image',
            'file' => asset('images/hero-fallback.jpg')
        ]"
    />
    <x-news-and-events
        :newsAndEvents="$newsAndEvents"
    />
</x-main-layout>
