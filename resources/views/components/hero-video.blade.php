@props([
    'videoPoster' => null,
    'videoSource' => null,
    'videoBannerTitle' => null,
    'videoBannerParagraph' => null,
])

<div class="mwPageBlock Include">
    <div class="blockContents">
        <div class="videoBanner videoBannerOne videoBannerLarge content-style">
            <div class="videoBannerWrap"
                 style="background-image: url('storage/{{ $videoPoster }}');background-size: cover;"
                 data-fit-img>
                <video autoplay="autoplay" loop="loop" muted="muted"
                       poster="{{ asset('storage/'.$videoPoster) }}" data-fit-img-child>
                    <source src="{{ asset('storage/'.$videoSource) }}" type="video/mp4" />
                    <img class="_img-fluid" alt="" src="{{ asset('storage/'.$videoPoster) }}" />
                </video>
                <div class="videoBannerInner">
                    <div class="container">
                        {{-- Banner Title --}}
                        <h1 class="videoBannerTitle">
                            {{ $videoBannerTitle }}
                        </h1>

                        {{-- Banner Subtitle --}}
                        <p class="videoBannerParagraph">
                            {{ $videoBannerParagraph }}
                        </p>

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
                    <a href="#" class="video-popup">
                        <img src=""> Play Full Video
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
