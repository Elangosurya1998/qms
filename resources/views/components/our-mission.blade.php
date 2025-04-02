@props([
    'backgroundImage' => null,
    'title' => null,
])

<div id="wH8PX13VN0QHT67A" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <style type="text/css">
            #contentArea-R0TC3K {
                background-image: url("{{ $backgroundImage }}");
                background-position: center;
                background-size: auto;
                background-repeat: no-repeat;
            }
        </style>

        <div id="contentArea-R0TC3K" class="contentArea contentAreaSmall _bg-primary content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="w5UI1RIBVM2D3ORL" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h6 style="text-align: center;">
                                    <span style="font-size: 14pt;">&mdash;{{ $title }}&mdash;
                                        &mdash;
                                        <br />
                                        <br /></span>
                                </h6>
                            </div>
                        </div>
                        <div id="w04TXFR8D5M6USQK" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h5 style="text-align: center;">
                                    <span style="color: #000000; font-size: 18pt;">{{ $paragraph }}</span>
                                </h5>
                            </div>
                        </div>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
