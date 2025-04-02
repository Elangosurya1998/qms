@props([
    'hero_type' => 'video',
    'id' => '',
    'class' => '',
    'title' => 'Default Title',
    'description' => 'Default Description',
    'backgroundImage' => 'frontend/files/default-bg.jpg',
    'videoPoster' => 'frontend/files/default-video-poster.jpg',
    'videoSource' => 'frontend/files/default-video.mp4',
    'subtitle' => 'Default Subtitle',
    'playButtonUrl' => '#',
    'playButtonImg' => 'frontend/images/play-button.png',
])

@if ($hero_type === 'image')
    {{-- Render the Hero Image --}}
    <x-hero-image
        :id="$id"
        :class="$class"
        :backgroundImage="$backgroundImage"
        :title="$title"
        :description="$description"
    />
@elseif ($hero_type === 'video')
    {{-- Render the Hero Video --}}
    <x-hero-video
        :id="$id"
        :class="$class"
        :videoPoster="$videoPoster"
        :videoSource="$videoSource"
        :title="$title"
        :subtitle="$subtitle"
        :playButtonUrl="$playButtonUrl"
        :playButtonImg="$playButtonImg"
    />
@else
    {{-- Fallback HTML for other types --}}
    <div id="wRW775AARTU0BJBO" class="mwPageBlock Include" style="">
        <div class="blockContents">
            <style type="text/css">
                #contentArea-SQUJ3F {
                    background-image: url("");
                    background-position: center;
                    background-size: auto;
                    background-repeat: no-repeat;
                }
            </style>

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
