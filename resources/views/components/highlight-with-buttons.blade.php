@props([
    'title' => null,
    'buttons' => []
])

<div id="w99PTKHYQEAOXJ97" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <div class="homeCTAWrap contentArea content-style">
            <div class="homeCTAInner">
                <div class="homeCTAContent">
                    <div id="wGPIUM4UY81L2SSI" class="mwPageBlock Content" style="">
                        <div class="blockContents">
                            <h2>
                                {{ $title }}
                            </h2>

                        </div>
                    </div>
                    <div class="Clear"></div>
                    <div class="mwPageArea">
                        <div id="w7XVF7MGITG393VR" class="mwPageBlock Include" style="">
                            <div class="blockContents">
                                <div class="twoCol row">
                                    @foreach ($buttons as $button)
                                        <div class="{{ $loop->odd ? 'twoColLeft' : 'twoColRight' }} col-md-6">
                                            <div class="mwPageArea">
                                                <div id="wKWBZJ8STT3PZKD1" class="mwPageBlock Button" style="">
                                                    <div class="blockContents">
                                                        <div class="mwBtnCenter">
                                                            <div class="btn btnYellow {{ $button['style'] == 'outline' ? 'btnOutline': ''}} btnRounded">
                                                                <a href="{{ $button['url'] }}" template="default"
                                                                   class="medium" target="_self">{{ $button['label'] }}</a>
                                                            </div>
                                                        </div>
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
            <div class="decoration">
                <div class="decoLine _mx-auto _mb-30 _bg-secondary" style="width: 2px; height: 128.5px;"></div>
            </div>
        </div>
    </div>
</div>
