@props([
    'page',
])
<x-main-layout>

    <x-hero :hero="$page->hero" :page="$page" />

    {{-- Include at the top if position is 'top' --}}
    @if ($page->quick_menu_position === 'top')
        <x-quick-menu :page="$page" />
    @endif


    @foreach ($page->content['modules'] as $index => $module)

        @if ($module['type'] === 'interactive_grid')
            <div style="{{ $page->hero['type'] === 'image' && $index == 0 ? 'margin-top: 150px !important;' : '' }}">
            <x-interactive-grid :title="$module['data']['title']" :columns="$module['data']['columns']" />
            </div>
        @endif

        @if ($module['type'] === 'split_content_section')
            <x-split-content-section
                :head="$module['data']['head']"
                :title="$module['data']['title']"
                :paragraph="$module['data']['paragraph']"
                :image="$module['data']['image']"
            />
        @endif

        @if($module['type'] === 'tabbed_interface')
            <x-tabbed-interface
                :title="$module['data']['title']"
                :tabs="$module['data']['tabs']"
            />
        @endif

        @if($module['type'] === 'highlight_with_buttons')
            <x-highlight-with-buttons
                :title="$module['data']['title']"
                :buttons="$module['data']['buttons']"
            />
        @endif

    @endforeach

    {{-- Include at the bottom if position is 'bottom' or no position is specified --}}
    @if ($page->quick_menu_position === 'bottom' || !$page->quick_menu_position)
        <x-quick-menu :page="$page" />
    @endif


</x-main-layout>
