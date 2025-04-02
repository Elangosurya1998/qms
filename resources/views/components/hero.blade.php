@props([
    'page',
    'hero' => [],
])

<div>
    @if ($hero['type'] === 'image' && !empty($hero['file']))
        <x-hero-image
            :backgroundImage="$hero['file']"
            :title="$page->title"
            :description="$page->excerpt"
        />
    @elseif ($hero['type'] === 'video' && !empty($hero['file']))
        <x-hero-video
            :videoPoster="data_get($hero, 'file')"
            :videoSource="$hero['file']"
            :title="$page->title"
            :subtitle="data_get($hero, 'caption')"
        />
    @else
        <div  class="mwPageBlock Include">
            <div class="blockContents">
                <div id="contentArea-SQUJ3F" class="contentArea contentAreaLarge _bg-black content-style">
                    <div class="contentAreaWrap">
                        <div class="container">
                            <div class="mwPageArea">
                                <div class="Clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
