@props([
    'id' => null,
    'backgroundImage' => null,
    'gridItems' => []
])
@foreach ($gridItems as $gridItem)
    <div id="w2GDN39S2I2R33FA" class="mwPageBlock Include" style="">
        <div class="blockContents">
            <style type="text/css">
                #contentArea-VDDFPA {
                    background-image:  url({{ asset('storage/'.$backgroundImage)}});
                    background-position: center;
                    background-size: auto;
                    background-repeat: no-repeat;
                }
            </style>
            <div id="contentArea-VDDFPA" class="contentArea contentAreaLarge _bg-white content-style">
                <div class="contentAreaWrap">
                    <div class="container">
                        <div class="mwPageArea">
                            <div id="wO50NN3PHQHCEO11" class="mwPageBlock Include" style="">
                                <div class="blockContents">
                                    <div class="twoCol twoColFullwidth row content-style">
                                        <div class="twoColLeft twoColFirst col-lg-6">
                                            <div class="twoColImg">
                                                <div id="wHNDMTSWS959E13Y" class="mwPageBlock File" style="">
                                                    <div class="blockContents">
                                                        <div class="stretchImg _bg-stretch" role="img" aria-label="" style="background-image:  url({{ asset('storage/'.$gridItem['image']) }});"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="twoColRight col-lg-6 _bg-white">
                                            <div class="twoColContent">
                                                <div class="mwPageArea">
                                                    <div id="wFXD93FX7BF829WZ" class="mwPageBlock Content" style="">
                                                        <div class="blockContents">
                                                            <p style="text-align: center;">
                                                                <strong>
                                                                    <span style="font-size: 14pt;">
                                                                        {{ $gridItem['content'] }}
                                                                    </span>
                                                                </strong>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="Clear"></div>
                                                </div>
                                            </div>
                                        </div>
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
@endforeach
