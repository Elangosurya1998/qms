@props([
    'page',
])
@section('title', $page->title)
<x-main-layout>
    <x-hero
        :hero="$page->hero"
        :title="$page->title"
        :description="$page->excerpt"
    />

    {{-- Include at the top if position is 'top' --}}
    @if ($page->quick_menu_enabled && $page->quick_menu_position === 'top')
        <x-quick-menu
            :title="data_get($page->quick_menus, 'title')"
            :blockContents="data_get($page->quick_menus, 'blockContents')"
            :quickMenus="data_get($page->quick_menus, 'linkItems')"
            :top="data_get($page->quick_menus, 'position')"
        />
    @endif

    {{-- Page Builder section --}}
    @if (!empty($page->content['modules']))
        @foreach ($page->content['modules'] as $index => $module)

            @if (isset($module['type']) && $module['type'] === 'interactive_grid')
                <div style="{{ isset($page->hero['type']) && $page->hero['type'] === 'image' && $index == 0 ? 'margin-top: 150px !important;' : '' }}">
                    <x-interactive-grid
                        :id="Str::random(5)"
                        :title="data_get($module, 'data.title')"
                        :columns="data_get($module, 'data.columns')"
                    />
                </div>
            @endif

            @if (isset($module['type']) && $module['type'] === 'split_content_section')
                <x-split-content-section
                    :id="Str::random(5)"
                    :head="data_get($module, 'data.head')"
                    :title="data_get($module, 'data.title')"
                    :paragraph="data_get($module, 'data.paragraph')"
                    :image="data_get($module, 'data.image')"
                    :buttons="data_get($module, 'data.buttons')"
                />
            @endif

            @if (isset($module['type']) && $module['type'] === 'tabbed_interface')
                <x-tabbed-interface
                    :id="Str::random(5)"
                    :title="data_get($module, 'data.title')"
                    :tabs="data_get($module, 'data.tabs')"
                />
            @endif

            @if (isset($module['type']) && $module['type'] === 'highlight_with_buttons')
                <x-highlight-with-buttons
                    :id="Str::random(5)"
                    :title="data_get($module, 'data.title')"
                    :backgroundImage="data_get($module, 'data.backgroundImage')"
                    :buttons="data_get($module, 'data.buttons')"
                />
            @endif

            @if (isset($module['type']) && $module['type'] === 'image_with_text_carousel')
                <x-image-with-text-carousel
                    :id="Str::random(5)"
                    :backgroundImage="data_get($module, 'data.backgroundImage')"
                    :carouselItems="data_get($module, 'data.carouselItems')"
                />
            @endif

            @if (isset($module['type']) && $module['type'] === 'title_with_content')
                <x-title-with-content
                    :id="Str::random(5)"
                    :backgroundImage="data_get($module, 'data.backgroundImage')"
                    :title="data_get($module, 'data.title')"
                    :content="data_get($module, 'data.content')"
                />
            @endif

            @if(isset($module['type']) && $module['type'] === 'full_with_image')
                <x-full-with-image
                    :id="Str::random(5)"
                    :image="data_get($module, 'data.image')"
                />
            @endif

            @if(isset($module['type']) && $module['type'] === 'icon_text_grid_block')
                <x-icon-with-grid-block
                    :id="Str::random(5)"
                    :title="data_get($module, 'data.title')"
                    :iconImage="data_get($module, 'data.icon_image')"
                    :backgroundColor="data_get($module, 'data.background_color')"
                    :backgroundImage="data_get($module, 'data.backgroundImage')"
                    :columns="data_get($module, 'data.columns')"
                />
            @endif

            @if(isset($module['type']) && $module['type'] === 'full_with_content')
                <x-full-with-content
                    :id="Str::random(5)"
                    :title="data_get($module, 'data.title')"
                    :content="data_get($module, 'data.columns')"
                />
            @endif

        @endforeach
    @else
        <x-page-under-construction />
    @endisset

    {{-- Include at the bottom if position is 'bottom' or no position is specified --}}
    @if ($page->quick_menu_enabled && $page->quick_menu_position === 'bottom')
        <x-quick-menu
            :title="data_get($page->quick_menus, 'title')"
            :blockContents="data_get($page->quick_menus, 'blockContents')"
            :quickMenus="data_get($page->quick_menus, 'linkItems')"
        />
    @endif

</x-main-layout>
