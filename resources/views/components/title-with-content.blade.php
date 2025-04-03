@props([
    'id' => null,
    'backgroundImage' => null,
    'title' => null,
    'content' => null
])

<div id="wH8PX13VN0QHT67A" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <style type="text/css">
            #contentArea-{{$id}} {
                background-image: url("storage\".{{ $backgroundImage }}");
                background-position: center;
                background-size: auto;
                background-repeat: no-repeat;
            }
        </style>

        <div id="contentArea-{{$id}}" class="contentArea _bg-primary content-style">

            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="wH0NOIF0IFNQJNGE" class="mwPageBlock Spacer" style=""><div class="blockContents"><div class="mwSpacer hor" style="height:30px;"></div></div></div>
                        <div id="w5UI1RIBVM2D3ORL" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h6 style="text-align: center;">
                                    <span style="font-size: 14pt;">
                                        &mdash; {{ $title }} &mdash;
                                    </span>
                                </h6>
                            </div>
                        </div>
                        <div id="w04TXFR8D5M6USQK" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h5 style="text-align: center;">
                                    <span style="color: #000000; font-size: 18pt;">{{ $content }}</span>
                                </h5>
                            </div>
                        </div>
                        <div id="wH0NOIF0IFNQJNGE" class="mwPageBlock Spacer" style=""><div class="blockContents"><div class="mwSpacer hor" style="height:15px;"></div></div></div>
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
