@props([
    'id' => 'NDSDE',
    'title' => 'Extracurricular Activities',
    'carouselItems' => [
        [
            'name' => 'Music Ministry',
            'image' => 'storage/uploads/background-images/DSC_0036~2.JPG',
            'description' => 'Join the Music Ministry to enhance your musical skills.',
            'url' => '/music-ministry',
        ],
        [
            'name' => 'Culinary Club',
            'image' => 'storage/uploads/background-images/DSC_0036~2.JPG',
            'description' => 'Let your inner chef shine with fun cooking sessions.',
            'url' => '/culinary-club',
        ],
        [
            'name' => 'Robotics Club',
            'image' => 'storage/uploads/background-images/DSC_0036~2.JPG',
            'description' => 'Explore robotics and innovation with hands-on projects.',
            'url' => '/robotics-club',
        ],
        [
            'name' => 'Art Club',
            'image' => 'storage/uploads/background-images/DSC_0036~2.JPG',
            'description' => 'Express your creativity with the Art Club activities.',
            'url' => '/art-club',
        ],
        [
            'name' => 'Drama Club',
            'image' => 'storage/uploads/background-images/DSC_0036~2.JPG',
            'description' => 'Step into the spotlight with the Drama Club’s productions.',
            'url' => '/drama-club',
        ],
        [
            'name' => 'Robotics Club',
            'image' => 'storage/uploads/background-images/DSC_0036~2.JPG',
            'description' => 'Explore robotics and innovation with hands-on projects.',
            'url' => '/robotics-club',
        ],
        [
            'name' => 'Art Club',
            'image' => 'storage/uploads/background-images/DSC_0036~2.JPG',
            'description' => 'Express your creativity with the Art Club activities.',
            'url' => '/art-club',
        ],
        [
            'name' => 'Drama Club',
            'image' => 'storage/uploads/background-images/DSC_0036~2.JPG',
            'description' => 'Step into the spotlight with the Drama Club’s productions.',
            'url' => '/drama-club',
        ]
    ]
])

<div id="wC2J3ZVBHE5T9CCP" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <div id="contentArea-XSP5GT" class="contentArea contentAreaLarge _bg-primary content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="w772AML51ZJPIOQE" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h3>
                                    {{ $title }}
                                </h3>
                            </div>
                        </div>
                        <div id="w80U5BS2HS6OAPGU" class="mwPageBlock Gallery" style="">
                            <div class="blockContents">
                                <div id="carousel-6JRHKO" class="carousel carouselFour content-style dots-style-3">
                                    <div class="carouselWrap slick-initialized slick-slider slick-dotted">
                                        <button class="slick-prev slick-arrow" aria-label="Previous" type="button" style="display: block;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <path d="M24 31L9 16 24 1" fill="none" stroke="#666"></path>
                                            </svg>
                                        </button>
                                        <div class="slick-list draggable" style="padding: 0px;">
                                            <div class="slick-track" style="opacity: 1; width: 19780px; transform: translate3d(-8170px, 0px, 0px);">
                                                @foreach($carouselItems as $key => $carouselItem)
                                                    @if ($key >= count($carouselItems) - 3)
                                                        <div class="carouselItem slick-slide slick-cloned" data-slick-index="{{ -($key + 1) }}"
                                                             aria-hidden="true" style="width: 430px;">
                                                            <div class="carouselHeader">
                                                                <div class="carouselImg" role="img" aria-label="{{ $carouselItem['name'] }}"
                                                                     style="background-image: url('{{ asset($carouselItem['image']) }}')"></div>
                                                                <div class="carouselOverlay"></div>
                                                                <h5 class="carouselTitle">{{ $carouselItem['name'] }}</h5>
                                                            </div>
                                                            <div class="carouselContent">
                                                                <div class="carouselDescription">{{ $carouselItem['description'] }}</div>
                                                                <div class="carouselBtn btn btnWhite btnOutline">
                                                                    <a class="small" href="{{ $carouselItem['url'] }}" target="_blank">Learn More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                @foreach($carouselItems as $key => $carouselItem)
                                                    <div class="carouselItem slick-slide" data-slick-index="{{$key ̰}}" aria-hidden="false" style="width: 430px;">
                                                        <div class="carouselHeader">
                                                            <div class="carouselImg" role="img" aria-label="{{ $carouselItem['name'] }}" style="background-image: url('{{ asset($carouselItem['image']) }}')"></div>
                                                            <div class="carouselOverlay"></div>
                                                            <h5 class="carouselTitle">{{ $carouselItem['name'] }}</h5>
                                                        </div>
                                                        <div class="carouselContent">
                                                            <div class="carouselDescription">{{ $carouselItem['description'] }}</div>
                                                            <div class="carouselBtn btn btnWhite btnOutline">
                                                                <a class="small" href="{{ $carouselItem['url'] }}" target="_blank">Learn More</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                @foreach ($carouselItems as $key => $carouselItem)
                                                    @if ($key < 3)
                                                        <div class="carouselItem slick-slide slick-cloned" data-slick-index="{{ count($carouselItems) + $key }}"
                                                             aria-hidden="true" style="width: 430px;">
                                                            <div class="carouselHeader">
                                                                <div class="carouselImg" role="img" aria-label="{{ $carouselItem['name'] }}"
                                                                     style="background-image: url('{{ asset($carouselItem['image']) }}')"></div>
                                                                <div class="carouselOverlay"></div>
                                                                <h5 class="carouselTitle">{{ $carouselItem['name'] }}</h5>
                                                            </div>
                                                            <div class="carouselContent">
                                                                <div class="carouselDescription">{{ $carouselItem['description'] }}</div>
                                                                <div class="carouselBtn btn btnWhite btnOutline">
                                                                    <a class="small" href="{{ $carouselItem['url'] }}" target="_blank">Learn More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <button class="slick-next slick-arrow" aria-label="Next" type="button" style="display: block;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                                                <path d="M8 31l15-15L8 1" fill="none" stroke="#666"></path>
                                            </svg>
                                        </button>
                                        <ul class="slick-dots" style="display: block;">
                                            @foreach($carouselItems as $key => $carouselItem)
                                                <li class="{{ $key == 1 ? 'slick-active' : ''}}">
                                                    <button type="button">{{ $key + 1 }}</button>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        (function () {
                                            $("#carousel-6JRHKO .carouselWrap").slick({
                                                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">' + SVG["arrow-left-1"] + '</button>',
                                                nextArrow: '<button class="slick-next" aria-label="Next" type="button">' + SVG["arrow-right-1"] + '</button>',
                                                dots: true,
                                                arrows: true,
                                                autoplay: true,
                                                infinite: true,
                                                accessibility: false,
                                                speed: 360,
                                                autoplaySpeed: 6000,
                                                centerMode: true,
                                                slidesToShow: 3,
                                                slidesToScroll: 1,
                                                centerPadding: '0',
                                                responsive: [
                                                    {
                                                        breakpoint: 991,
                                                        settings: {
                                                            slidesToShow: 1,
                                                            centerPadding: '25%'
                                                        }
                                                    },
                                                    {
                                                        breakpoint: 575,
                                                        settings: {
                                                            centerMode: false,
                                                            slidesToShow: 1
                                                        }
                                                    }
                                                ]
                                            });
                                        })();
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
