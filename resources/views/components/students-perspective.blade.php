@props([
    'title' => null,
    'studentsPerspective' => [['backgroundImage' => null], ['paragraph' => null], ['author' => null]],
])

<div id="wMA498HSWPK1URG2" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <style type="text/css">
            #contentArea-N4R6GE {
                background-image: url("");
                background-position: center;
                background-size: auto;
                background-repeat: no-repeat;
            }
        </style>

        <div id="contentArea-N4R6GE" class="contentArea contentAreaLarge _bg-white content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="wU7P3KNO34SWZHQD" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h2 style="text-align: center;">
                                    {{ $title }}

                                </h2>
                            </div>
                        </div>
                        <div id="w5UCUAE7P5A255RH" class="mwPageBlock Include" style="">
                            <div class="blockContents">
                                <div class="threeCol row">
                                    @foreach ($variable as $key => $value)
                                        <div class="threeColItem col-lg-4 col-md-6">
                                            <div class="mwPageArea">
                                                <div id="wZST6ROVRK1WFB8K" class="mwPageBlock Include" style="">
                                                    <div class="blockContents">

                                                        <div id="animate-1IYFCZZ8F6" class="animate" data-aos="fade-up"
                                                            data-aos-duration="500" data-aos-delay="0">
                                                            <div class="mwPageArea">
                                                                <div id="wSRHTY0ONKPZGF50" class="mwPageBlock Include"
                                                                    style="">
                                                                    <div class="blockContents">
                                                                        <div class="PerspectivesWrap"
                                                                            style="background: url('{{ asset('frontend/files/galleries/Charlie_Burks_1433.gif') }}') center center no-repeat; background-size:cover !important;">
                                                                            <div class="PerspectivesShadow trans"
                                                                                style="background: url('{{ asset('frontend/files/galleries/Charlie_Burks-0001.png') }}') center center no-repeat; background-size:cover">
                                                                                <div class="PerspectivesInner trans">
                                                                                    <div class="PerspectivesBtn trans">
                                                                                        <a href="{{ asset('frontend/files/galleries/CB_Choose.mp4') }}"
                                                                                            class="video-popup"><img
                                                                                                src="{{ asset('frontend/images/play-button-large.png') }}" /></a>
                                                                                    </div>
                                                                                    <h3>Ask Charlie</h3>
                                                                                    <h6>Class of 2025</h6>
                                                                                    <p><a href="{{ asset('frontend/files/galleries/CB_Choose.mp4') }}"
                                                                                            class="video-popup">Why
                                                                                            Foley</a></p>
                                                                                    <p><a href="{{ asset('frontend/files/galleries/CB_FoleyFamily.mp4') }}"
                                                                                            class="video-popup">Foley
                                                                                            Family Means...
                                                                                        </a></p>
                                                                                    <p><a href="{{ asset('frontend/files/galleries/CB_Prepare.mp4') }}"
                                                                                            class="video-popup">Foley
                                                                                            Prepares me
                                                                                            For... </a></p>
                                                                                    <p><a href="{{ asset('frontend/files/galleries/CB_Program.mp4') }}"
                                                                                            class="video-popup">Favorite
                                                                                            BFC Programs</a>
                                                                                    </p>
                                                                                    <p><a href="{{ asset('frontend/files/galleries/CB_Memory.mp4') }}"
                                                                                            class="video-popup">Favorite
                                                                                            Memory</a></p>
                                                                                    <p><a href="{{ asset('frontend/files/galleries/CB_Advice.mp4') }}"
                                                                                            class="video-popup">My
                                                                                            Advice</a></p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="Clear"></div>
                                                            </div>

                                                        </div>
                                                        <style>
                                                            .animate .liveEdArea {
                                                                padding: 10px;
                                                            }

                                                            .animate .liveEdArea:before {
                                                                content: "Animate";
                                                                border: 1px solid #ccc;
                                                                float: right;
                                                                background: #00a99d;
                                                                color: #fff;
                                                                font-size: 10px;
                                                                padding: 6px;
                                                            }
                                                        </style>
                                                    </div>
                                                </div>
                                                <div id="w5CKM4FW2T6DCJJS" class="mwPageBlock Spacer" style="">
                                                    <div class="blockContents">
                                                        <div class="mwSpacer small hor"></div>
                                                    </div>
                                                </div>
                                                <div class="Clear"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
