@props([
    'tesimonialItems' => [['backgroundImage' => null], ['paragraph' => null], ['author' => null]],
])

<div id="w0KB2HBX0EW5PEX2" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <style type="text/css">
            #contentArea-1174C2 {
                background-image: url("");
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
            }
        </style>

        <div id="contentArea-1174C2" class="contentArea contentAreaLarge _bg-gray-darkest content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="wQU43693BG3XEZ7T" class="mwPageBlock Gallery" style="">
                            <div class="blockContents">
                                <div id="carousel-PIRX5A" class="carousel carouselOne content-style studentCarousel">
                                    <div class="carouselWrap">
                                        @foreach ($tesimonialItems as $item)
                                            <div class="carouselItem">
                                                <div class="twoColLeft"
                                                    style="background: url({{ $item['backgroundImage'] }}) center center no-repeat; background-size: cover;">
                                                    <div class="studentOverlay"></div>
                                                </div>
                                                <div class="twoColRight">
                                                    <div class="studentInfo">
                                                        <p>{{ $item['paragraph'] }}</p>
                                                        <p class="studentTitle">- {{ $item['author'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $(document).ready(function() {
                                        (function() {
                                            $('#carousel-PIRX5A .carouselWrap').slick({
                                                prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">' +
                                                    SVG[
                                                        "arrow-left-1"] + '</button>',
                                                nextArrow: '<button class="slick-next" aria-label="Next" type="button">' +
                                                    SVG[
                                                        "arrow-right-1"] + '</button>',
                                                dots: true,
                                                arrows: true,
                                                autoplay: true,
                                                infinite: true,
                                                accessibility: false,
                                                speed: 1000,
                                                autoplaySpeed: 6000,
                                                slidesToShow: 1,
                                                slidesToScroll: 1,
                                                responsive: [{
                                                        breakpoint: 991,
                                                        settings: {
                                                            slidesToShow: 1,
                                                            slidesToScroll: 1,
                                                            arrows: false
                                                        }
                                                    },
                                                    {
                                                        breakpoint: 575,
                                                        settings: {
                                                            slidesToShow: 1,
                                                            slidesToScroll: 1,
                                                            arrows: false
                                                        }
                                                    }
                                                ]
                                            });
                                        })();
                                    });
                                </script>
                                <script type="text/javascript">
                                    jQuery(function() {
                                        mwInitMedia('#wQU43693BG3XEZ7T')
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

<div id="wG2G3BSEACUTZ77A" class="mwPageBlock Spacer" style="">
    <div class="blockContents">
        <div class="mwSpacer hor" style="height:15px;"></div>
    </div>
</div>
