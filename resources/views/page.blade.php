@props([
    'page',
])
<x-main-layout>

    <x-hero :hero="$page->hero" :page="$page" />

    <x-quick-menu :page="$page" />

</x-main-layout>
