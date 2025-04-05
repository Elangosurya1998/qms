@props([
    'post',
])
@section('title', $post->title)
<x-main-layout>
    <x-hero
        :hero="$post->hero"
        :title="$post->title"
        :description="$post->excerpt"
    />

    {{-- Include at the top if position is 'top' --}}
    @if ($post->quick_menu_enabled && $post->quick_menu_position === 'top')
        <x-quick-menu
            :title="data_get($post->quick_menus, 'title')"
            :blockContents="data_get($post->quick_menus, 'blockContents')"
            :quickMenus="data_get($post->quick_menus, 'linkItems')"
            :top="data_get($page->quick_menus, 'position')"
        />
    @endif

    {{-- Post Builder Section --}}
    @if (!empty($post->content))
        <x-full-with-content
            :id="Str::random(5)"
            :title="$post->title"
            :excerpt="$post->excerpt"
            :content="$post->content"
        />
    @else
        <x-page-under-construction />
    @endisset

    {{-- Include at the bottom if position is 'bottom' or no position is specified --}}
    @if ($post->quick_menu_enabled && $post->quick_menu_position === 'bottom')
        <x-quick-menu
            :title="data_get($post->quick_menus, 'title')"
            :blockContents="data_get($post->quick_menus, 'blockContents')"
            :quickMenus="data_get($post->quick_menus, 'linkItems')"
        />
    @endif

</x-main-layout>
