@section('title', 'Gallery')
<x-main-layout>
    <x-hero
        title="Gallery"
        description="Explore our collection of amazing galleries and moments captured in photos."
        :hero="[
            'type' => 'image',
            'file' => asset('images/hero-fallback.jpg')
        ]"
    />
    <x-gallery
        :galleries="$galleries"
    />
</x-main-layout>
