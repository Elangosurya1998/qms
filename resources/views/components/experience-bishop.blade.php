@props([
    'blockContent1' => null,
    'blockContent2' => null,
    'button1' => null,
    'button2' => null,
    'button1Link' => null,
    'button2Link' => null,
])

<div id="w99PTKHYQEAOXJ97" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <div class="homeCTAWrap contentArea content-style">
            <div class="homeCTAInner">
                <div class="homeCTAContent">
                    <div id="wGPIUM4UY81L2SSI" class="mwPageBlock Content" style="">
                        <div class="blockContents">
                            <h2>
                                {{ $blockContent1 }}
                                <br />
                                {{ $blockContent2 }}

                            </h2>
                        </div>
                    </div>
                    <div class="mwPageArea">
                        <div id="w7XVF7MGITG393VR" class="mwPageBlock Include" style="">
                            <div class="blockContents">

                                <div class="twoCol row ">

                                    <div class="twoColLeft col-md-6">
                                        <div class="mwPageArea">
                                            <div id="wKWBZJ8STT3PZKD1" class="mwPageBlock Button" style="">
                                                <div class="blockContents">
                                                    <div class="mwBtnCenter">
                                                        <div class="btn btnYellow btnRounded">
                                                            <a href="{{ $button1Link }}" template="default"
                                                                class="medium" target="_self">{{ $button1 }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="Clear"></div>
                                        </div>
                                    </div>
                                    <div class="twoColRight col-md-6">
                                        <div class="mwPageArea">
                                            <div id="w065ICIUTB5D8D50" class="mwPageBlock Button" style="">
                                                <div class="blockContents">
                                                    <div class="mwBtnCenter">
                                                        <div class="btn btnYellow btnOutline btnRounded">
                                                            <a href="{{ $button2Link }}" template="default"
                                                                class="medium" target="_self">{{ $button2 }}</a>
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
                        <div class="Clear"></div>
                    </div>
                </div>
            </div>
            <div class="decoration">
                <div class="decoLine _mx-auto _mb-30 _bg-secondary" style="width: 2px; height: 128.5px;"></div>
            </div>
        </div>
    </div>
</div>
