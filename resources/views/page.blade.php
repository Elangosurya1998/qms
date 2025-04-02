@props([
    'page',
])
<x-main-layout>

    <x-hero :hero="$page->hero" :page="$page" />

    @foreach ($page->content['modules'] as $module)

        @if ($module['type'] === 'interactive_grid')
            <x-interactive-grid :title="$module['data']['title']" :columns="$module['data']['columns']" />
        @endif

        @if ($module['type'] === 'split_content_section')
             <x-split-content-section
                 :head="$module['data']['head']"
                 :title="$module['data']['title']"
                 :paragraph="$module['data']['paragraph']"
                 :image="$module['data']['image']"
             />
        @endif


    @endforeach

    <x-tabbed-interface />

    <x-quick-menu :page="$page" />

</x-main-layout>
