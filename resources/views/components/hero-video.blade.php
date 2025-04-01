@props([
    'id' => 'default-id',
    'class' => '',
    'videoPoster' => asset('frontend/files/galleries/BFC_Video_Placeholder.jpg'),
    'videoSource' => asset('frontend/files/galleries/Sequence_01.webm'),
    'title' => 'Ready to start your next',
    'subtitle' => 'Adventure?',
    'playButtonUrl' => '#',
    'playButtonImg' => asset('frontend/images/play-button.png'),
])

<div id="{{ $id }}" class="mwPageBlock Include {{ $class }}" style="">
    <div class="blockContents">
        <div class="videoBanner videoBannerOne videoBannerLarge content-style">
            <div class="videoBannerWrap"
                 style="background-image: url('{{ $videoPoster }}')"
                 data-fit-img>
                <video autoplay="autoplay" loop="loop" muted="muted"
                       poster="{{ $videoPoster }}" data-fit-img-child>
                    <source src="{{ $videoSource }}" type="video/mp4" />
                    <img class="_img-fluid" alt="" src="{{ $videoPoster }}" />
                </video>
                <div class="videoBannerInner">
                    <div class="container">
                        {{-- Banner Title --}}
                        <h1 class="videoBannerTitle">
                            {{ $title }}
                        </h1>

                        {{-- Banner Subtitle --}}
                        <p class="videoBannerParagraph">{{ $subtitle }}</p>

                        {{-- Decoration Line --}}
                        <div class="decoration">
                            <div class="decoLine _mx-auto _mb-30 _bg-secondary" style="width: 2px; height: 128.5px;">
                            </div>
                        </div>

                        {{-- Buttons Area: Add content later if needed --}}
                        <div class="videoBannerBtns">
                            {{-- Add buttons here dynamically if needed --}}
                        </div>
                    </div>
                </div>

                {{-- Play Button --}}
                <div class="playbutton">
                    <a href="{{ $playButtonUrl }}" class="video-popup">
                        <img src="{{ $playButtonImg }}"> Play Full Video
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
