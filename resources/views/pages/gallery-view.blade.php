@section('title', $gallery->created_at->format('Y') . $gallery->title )
<x-main-layout>
    <x-hero
        :title="$gallery->created_at->format('Y') .' '. $gallery->title"
        :hero="[
            'type' => 'image',
            'file' => asset('images/hero-fallback.jpg')
        ]"
    />
    <x-gallery-view
        :gallery="$gallery"
    />
</x-main-layout>
