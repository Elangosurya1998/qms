@props([
    'page',
])
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
            :backgroundImage="data_get($page->quick_menus, 'backgroundImage')"
        />
    @endif


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

        @endforeach
    @else
        <div id="wHTQESCH98BYS0TJ" class="mwPageBlock Include" style="">
            <div class="blockContents">
                <style type="text/css">
                    #contentArea-{{Str::random(5)}} {
                        background-image:  url("");
                        background-position: center;
                        background-size: auto;
                        background-repeat: no-repeat;
                    }
                </style>

                <div id="contentArea-VX05NZ" class="contentArea contentAreaLarge _bg-white content-style">
                    <div class="contentAreaWrap">
                        <div class="container">
                            <div class="mwPageArea">
                                <div id="wQ6YDFMEXK0LC12I" class="mwPageBlock Content" style="">
                                    <div class="blockContents">
                                        <h1 style="text-align: center;">
                                            PAGE UNDER CONSTRUCTION
                                        </h1>
                                        <h5 style="text-align: center;">
                                            We are unable to find the page you were looking for or it is still under construction.
                                        </h5>
                                        <h5 style="text-align: center;">
                                            Please check back soon, or <a href="/" style="color: var(--color-default);">click here</a> to return to the homepage.
                                        </h5>
                                    </div>
                                </div>
                                <div class="Clear"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endisset

    {{-- Include at the bottom if position is 'bottom' or no position is specified --}}
    @if ($page->quick_menu_enabled && $page->quick_menu_position === 'bottom')
        <x-quick-menu
            :title="data_get($page->quick_menus, 'title')"
            :blockContents="data_get($page->quick_menus, 'blockContents')"
            :quickMenus="data_get($page->quick_menus, 'linkItems')"
            :backgroundImage="data_get($page->quick_menus, 'backgroundImage')"
        />
    @endif

</x-main-layout>
