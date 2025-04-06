@props([
    'id' => null,
    'title' => null,
    'galleries' => [],
    'view' => false
])

<div id="w7CW2TC1TL73L4BM" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <style type="text/css">
            #contentArea-CEBDZ4 {
                background-image:  url("");
                background-position: center;
                background-size: auto;
                background-repeat: no-repeat;
            }
        </style>

        <div id="contentArea-CEBDZ4" class="contentArea contentAreaLarge _bg-white content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="wUTRNLZQEPQPRLMK" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h2 style="text-align: center;">
                                    {{ $title }}
                                </h2>
                            </div>
                        </div>
                        <div id="w0TXE4DS7P5E5FS3" class="mwPageBlock Include" style="">
                            <div class="blockContents">
                                @foreach ($galleries as  $key  => $gallery)

                                    @if ($key % 4 == 0)
                                        <div class="fourCol row justify-content-center">
                                    @endif
                                        <div class="fourColItem col-lg-3 col-sm-6">
                                            <div class="mwPageArea">
                                                <div id="wHA510NHN5ELT34E" class="mwPageBlock File" style="">
                                                    <div class="blockContents">
                                                        <div class="mwFileEmbed Image" style="overflow:hidden">
                                                            <a href="{{ url('gallery/'.$gallery->slug) }}" target="" style="display: block !important; ">
                                                                <img id="image_{{$id.$key}}" src="{{asset('storage/'.$gallery->thumbnails['url'])}}" class="mwFile Image full imgEd" style="display: block; border:none;width:100%; margin: 0 0%;" alt="{{ $gallery->thumbnails['alt'] }}">
                                                            </a>
                                                        </div>
                                                        <script type="text/javascript">
                                                            (function () {
                                                                // Getting image to setup
                                                                var $img = document.getElementById('image_{{$id.$key}}');
                                                                mwLoadImage($img, 300, 300);
                                                            })();
                                                        </script>
                                                    </div>
                                                </div>
                                                <div id="w9LJAKMHP2NO2U4U" class="mwPageBlock Content" style="">
                                                    <div class="blockContents  pad-top-s">
                                                        <h5 style="text-align: center;">
                                                            <a href="{{ url('gallery/'.$gallery->slug) }}">{{ $gallery->title }}&nbsp;</a>
                                                            <br>
                                                            <a href="{{ url('gallery/'.$gallery->slug) }}">{{ $gallery->created_at->format('Y') }}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="Clear"></div>
                                            </div>
                                        </div>
                                    @if (($key % 4 == 3) || $loop->last)
                                        </div>
                                    @endif

                                @endforeach
                                </div>
                            </div>
                        </div>
                        @if ($view)
                            <div id="wRCFY17G8P8YPOF7" class="mwPageBlock Button" style="">
                                <div class="blockContents">
                                    <div class="mwBtnCenter">
                                        <div class="btn btnDefault btnRounded">
                                            <a href="{{ url('galleries') }}" class="medium" target="_blank">VIEW MORE</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div id="wO7CPBL11X70X9ER" class="mwPageBlock Spacer" style="">
                            <div class="blockContents">
                                <div class="mwSpacer small hor"></div>
                            </div>
                        </div>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
