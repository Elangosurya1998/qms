<div class="blockContents">
    <style>
        .homeCTAWrap-{{$id}} {
            background: url("{{ asset('storage/' . $backgroundImage) }}") center center no-repeat;
            background-size: cover;
        }
    </style>
    <div  class="homeCTAWrap-{{$id}} contentArea content-style">
        @if($backgroundImage == null)
            <div class="decoration">
                <div class="decoLine _mx-auto _mb-30 _bg-secondary" style="width: 2px; height: 128.5px;"></div>
            </div>
        @endif
        <div class="homeCTAInner" style="{{$backgroundImage == null ? 'background:none;padding:0px;' : ''}}">
            <div class="homeCTAContent">
                <div id="wHJCMSGZ2DNA2IU3" class="mwPageBlock Spacer" style="">
                    <div class="blockContents">
                        <div class="mwSpacer medium hor"></div>
                    </div>
                </div>
                <div id="wD5DQLSUYOYGSYVR" class="mwPageBlock Content" style="">
                    <div class="blockContents">
                        <h2>
                            {{ $title }}
                        </h2>
                    </div>
                </div>
                <div class="mwPageArea">
                    <div id="wIU629FDT6OF7BVM" class="mwPageBlock Include" style="">
                        <div class="blockContents">
                            <div class="row">
                                @foreach ($buttons as $button)
                                    @php
                                        $colClass = match (count($buttons)) {
                                            1 => 'col-md-12',
                                            2 => 'col-md-6',
                                            default => 'col-md-4',
                                        };
                                    @endphp
                                    <div class="{{ $colClass }}">
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
                <div id="wHJCMSGZ2DNA2IU3" class="mwPageBlock Spacer" style="">
                    <div class="blockContents">
                        <div class="mwSpacer medium hor"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


