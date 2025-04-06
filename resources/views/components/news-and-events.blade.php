@props([
    'id' => null,
    'title' => null,
    'newsAndEvents' => [],
    'view' => false
])
@php
    // Define the column class configurations
    $columnClasses = ['col-lg-7', 'col-lg-5', 'col-lg-4', 'col-lg-4', 'col-lg-4'];
    $currentConfigIndex = 0;
    $newsCount = count($newsAndEvents);
@endphp

<div id="wPLA9RJG56FADCPV" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <div class="contentWidth content-style">
            <div class="contentWidthWrap _mx-lg-auto _mx-auto" style="max-width: 1170px;">
                <div class="mwPageArea">
                    <div id="wC0D44T9WDL1OIUO" class="mwPageBlock Spacer" style="">
                        <div class="blockContents">
                            <div class="mwSpacer hor" style="height:80px;"></div>
                        </div>
                    </div>
                    <div id="wMLC2P16PQ9L4NA0" class="mwPageBlock Content" style="">
                        <div class="blockContents">
                            <h2 style="text-align: center;">
                                {{ $title }}
                            </h2>
                        </div>
                    </div>
                    <div id="wYYE8FRSFCN5HXB1" class="mwPageBlock Include" style="">
                        <div class="blockContents  pad-top-m">
                            <div class="twoCol row">
                                @foreach ($newsAndEvents as $index => $newsAndEvent)
                                    @php
                                        // Determine column class dynamically
                                        if ($newsCount === 5) {
                                            $colClass = $columnClasses[$index];
                                        } else {
                                            // Default fallback for other numbers of news items
                                            if ($newsCount === 1) {
                                                $colClass = 'col-lg-12'; // Full-width
                                            } elseif ($newsCount === 2) {
                                                $colClass = $index === 0 ? 'col-lg-7' : 'col-lg-5'; // 7-5 split
                                            } elseif ($newsCount === 3) {
                                                $colClass = $index === 0 ? 'col-lg-7' : ($index === 1 ? 'col-lg-5' : 'col-lg-12'); // 7-5-12 split
                                            } elseif ($newsCount === 4) {
                                                $colClass = $index === 0 ? 'col-lg-7' : ($index < 3 ? 'col-lg-5' : 'col-lg-7'); // Custom logic for four items
                                            } else {
                                                $colClass = 'col-lg-4'; // Fallback for more than 5 items
                                            }
                                        }
                                    @endphp



                                    <div class="twoColLeft {{ $colClass }}">
                                        <div class="mwPageArea">
                                            <div id="wHXYZRB17FQOX3UO" class="mwPageBlock File" style="">
                                                <div class="blockContents">
                                                    <div id="imgCard-{{$newsAndEvent->slug}}" class="imgCard imgCardFour">
                                                        <div class="imgCardWrap" data-mh="imgCardWrap" style="height: 360px;">
                                                            <div class="imgCardImg _bg-center" role="img" aria-label="{{ $newsAndEvent->title }}" style="background-image: url({{ asset('storage/'.$newsAndEvent->feature_image) }})"></div>
                                                            <div class="imgCardGradient"></div>
                                                            <div class="imgCardBody">
                                                                <h5 class="imgCardTitle" style="transform: translateY(15px);">{{ $newsAndEvent->title }}</h5>
                                                                <div class="imgCardDescription" style="transform: translateY(15px); opacity: 0;"></div>
                                                                <div class="imgCardLink btn btnOutline btnRounded btnWhite">
                                                                    <a href="{{ $newsAndEvent->slug_url }}" target="_blank" class="small">
                                                                        <i class="fas fa-feather-alt"></i>
                                                                        <span>Explore</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <script type="text/javascript">
                                                        $(document).ready(function () {
                                                            (function () {
                                                                var $el = $('#imgCard-{{$newsAndEvent->slug}}');
                                                                var $title = $('#imgCard-{{$newsAndEvent->slug}} .imgCardTitle');
                                                                var $des = $('#imgCard-{{$newsAndEvent->slug}} .imgCardDescription');

                                                                //--------------------------------
                                                                // Initialize
                                                                //--------------------------------
                                                                //
                                                                // Exit on mobile devices
                                                                //
                                                                if (_isMobileDevices()) return false;

                                                                // Hide targets
                                                                //
                                                                hide();

                                                                //--------------------------------
                                                                // Hover
                                                                //--------------------------------
                                                                //
                                                                // Mouse Over
                                                                //
                                                                $el.on('mouseenter', function () {
                                                                    show();
                                                                });

                                                                // Mouse Leave
                                                                //
                                                                $el.on('mouseleave', function () {
                                                                    hide();
                                                                });

                                                                //--------------------------------
                                                                // Resize
                                                                //--------------------------------
                                                                //
                                                                $(window).on('resize', _debounce(function () {
                                                                    hide();
                                                                }, 250));

                                                                //--------------------------------
                                                                // Functions
                                                                //--------------------------------
                                                                //
                                                                // Hide Function
                                                                //
                                                                function hide() {
                                                                    $des.css({
                                                                        'transform': 'translateY(' + $des.outerHeight(true) + 'px)',
                                                                        'opacity': 0
                                                                    });

                                                                    $title.css({
                                                                        'transform': 'translateY(' + $des.outerHeight(true) + 'px)'
                                                                    });
                                                                }

                                                                // Show Function
                                                                //
                                                                function show() {
                                                                    $des.css({
                                                                        'transform': 'translateY(0)',
                                                                        'opacity': 1
                                                                    });

                                                                    $title.css({
                                                                        'transform': 'translateY(0)'
                                                                    });
                                                                }
                                                            })();
                                                        });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="Clear"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @if($view)
                    <div id="wRCFY17G8P8YPOF7" class="mwPageBlock Button" style="">
                        <div class="blockContents">
                            <div class="mwBtnCenter">
                                <div class="btn btnDefault btnRounded">
                                    <a href="{{ route('news-and-events') }}" class="medium" target="">VIEW MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div id="wC0D44T9WDL1OIUO" class="mwPageBlock Spacer" style="">
                        <div class="blockContents">
                            <div class="mwSpacer hor" style="height:50px;"></div>
                        </div>
                    </div>
                    <div class="Clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>
