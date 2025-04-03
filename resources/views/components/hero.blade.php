@props([
    'title' => 'Oops!',
    'description' => 'Looks like the page you are looking for is not here',
    'hero' => [],
])

@if (data_get($hero, 'type') === 'image' && !empty(data_get($hero, 'file')))
    <x-hero-image
        :backgroundImage="data_get($hero, 'file')"
        :title="$title"
        :description="$description"
    />
@elseif (data_get($hero, 'type') === 'video' && !empty(data_get($hero, 'videoFile')))
    <x-hero-video
        :videoPoster="data_get($hero, 'videoPoster')"
        :videoSource="data_get($hero, 'videoFile')"
        :videoBannerTitle="data_get($hero, 'videoBannerTitle')"
        :videoBannerParagraph="data_get($hero, 'videoBannerParagraph')"
    />
@else
    <div class="mwPageBlock Include">
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
