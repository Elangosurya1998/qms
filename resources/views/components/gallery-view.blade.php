@props([
    'id' => null,
    'title' => null,
    'gallery' => [],
])

<div id="wA5YEFLJASTG7KTU" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <style type="text/css">
            #contentArea-UU6Z36 {
                background-image:  url("");
                background-position: center;
                background-size: auto;
                background-repeat: no-repeat;
            }
        </style>
        <div id="contentArea-UU6Z36" class="contentArea contentAreaLarge _bg-white content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="wDYTSLR9BDWB6PUT" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h2>
                                    Photo Gallery
                                </h2>
                            </div>
                        </div>
                        <div id="wC5AIRSOZ385BGVM" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <p>
                                   {{ $gallery->description  }}
                                </p>
                            </div>
                        </div>
                        <div id="wBPHL5I97ECRZUPM" class="mwPageBlock Spacer" style="">
                            <div class="blockContents">
                                <div class="mwSpacer small hor"></div>
                            </div>
                        </div>
                        <div id="wOGOG7RDBRY7C103" class="mwPageBlock Gallery" style="">
                            <div class="blockContents">
                                <div class="gallery galleryOne">
                                    <div class="galleryWrap">
                                        <div class="row">
                                            @foreach($gallery->images as $image)
                                                <div class="galleryItem col-md-2 col-6">
                                                    <a class="galleryItemWrap img-popup" href="{{ asset('storage/'. $image)  }}">
                                                        <div class="galleryImg _ratio-43 _bg-center" role="img" style="background-image: url('{{ asset('storage/'. $image)  }}')"></div>
                                                        <div class="galleryOverlay"></div>
                                                        <div class="galleryContent">
                                                            <i class="galleryIcon fas fa-search-plus"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    jQuery( function () { mwInitMedia('#wOGOG7RDBRY7C103') } );
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
