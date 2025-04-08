@props([
    'id' => null,
    'title' => null,
    'excerpt' => null,
    'content' => null,
])
<div id="contentArea-{{$id}}" class="contentArea contentAreaLarge _bg-white content-style">
    <div class="contentAreaWrap">
        <div class="container">
            <div class="mwPageArea">

                <div id="w52IR7X45H6GECFV" class="mwPageBlock Content" style="">
                    <div class="blockContents">
                        <h2 style="text-align: center;">
                            {{ $title }}
                        </h2>
                    </div>
                </div>

                @foreach ($content as $record)
                    @if($record['type'] == 'single')
                        @if($record['title'])
                        <div id="wQFF0QXSJFIAIUY0" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h3>
                                    {{ $record['title'] }}
                                </h3>
                            </div>
                        </div>
                        @endif
                        <div id="wSAMXWBVTHPCO3KQ" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                {!! str($record['column_1'])->sanitizeHtml() !!}
                            </div>
                        </div>
                    @endif
                    @if($record['type'] == 'two')
                            @if($record['title'])
                        <div id="wQFF0QXSJFIAIUY0" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h3>
                                    {{ $record['title'] }}
                                </h3>
                            </div>
                        </div>
                            @endif
                        <div id="wO50NN3PHQHCEO11" class="mwPageBlock Include" style="">
                            <div class="blockContents">
                                <div class="twoCol row content-style">
                                    <div class="twoColLeft twoColFirst col-lg-6">
                                        {!! str($record['column_1'])->sanitizeHtml() !!}
                                    </div>
                                    <div class="twoColRight col-lg-6">
                                        {!! str($record['column_2'])->sanitizeHtml() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($record['type'] == 'two-1-2')
                        @if($record['title'])
                            <div id="wQFF0QXSJFIAIUY0" class="mwPageBlock Content" style="">
                                <div class="blockContents">
                                    <h3>
                                        {{ $record['title'] }}
                                    </h3>
                                </div>
                            </div>
                        @endif
                        <div id="wO50NN3PHQHCEO11" class="mwPageBlock Include" style="">
                            <div class="blockContents">
                                <div class="twoCol row content-style">
                                    <div class="twoColLeft twoColFirst {{ $record['reverse'] == true ? 'col-md-8': 'col-lg-4'}}">
                                        {!! str($record['column_1'])->sanitizeHtml() !!}
                                    </div>
                                    <div class="twoColRight {{ $record['reverse'] == true ? 'col-md-4': 'col-lg-8'}}">
                                        {!! str($record['column_2'])->sanitizeHtml() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($record['type'] == 'irregular_grid')
                        <div id="wO50NN3PHQHCEO11" class="mwPageBlock Include" style="">
                            <div class="blockContents">
                                <div class="mwSpacer hor" style="height:50px;"></div>
                            </div>
                            @if($record['reverse'] == false)
                                <div class="blockContents">
                                <div class="twoCol twoColFullwidth row content-style">
                                    <div class="twoColLeft twoColFirst col-lg-6">
                                        <div class="twoColImg">
                                            <div id="wHNDMTSWS959E13Y" class="mwPageBlock File" style="">
                                                <div class="blockContents">
                                                    <div class="stretchImg _bg-stretch" role="img" aria-label="" style="background-image:  url({{ asset('storage/'.$record['image']) }});"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="twoColRight col-lg-6 _bg-white">
                                        <div class="twoColContent">
                                            <div class="mwPageArea">
                                                <div id="wTIPRXZV3FF850U2" class="mwPageBlock Content" style="">
                                                    <div class="blockContents">
                                                        <h3>
                                                            {{ $record['title'] }}
                                                        </h3>
                                                    </div>
                                                </div>
                                                <div id="wFX2WLIPHZHK8ZR9" class="mwPageBlock Content" style="">
                                                    <div class="blockContents">
                                                        <p>
                                                            {{ $record['content'] }}
                                                        </p>
                                                    </div>
                                                </div>
{{--                                                <div id="wPDNL12NIEVLFCXN" class="mwPageBlock Button" style="">--}}
{{--                                                    <div class="blockContents">--}}
{{--                                                        <div class="mwBtnLeft">--}}
{{--                                                            <div class="btn btnYellow btnOutline btnRounded">--}}
{{--                                                                <a href="#" template="default" class="medium" target="_self">Learn more</a>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="Clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="blockContents">
                                    <div class="twoCol twoColFullwidth row content-style">
                                        <div class="twoColLeft col-lg-6 _bg-white">
                                            <div class="twoColContent">
                                                <div class="mwPageArea">
                                                    <div id="wTIPRXZV3FF850U2" class="mwPageBlock Content" style="">
                                                        <div class="blockContents">
                                                            <h3>
                                                                {{ $record['title'] }}
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div id="wFX2WLIPHZHK8ZR9" class="mwPageBlock Content" style="">
                                                        <div class="blockContents">
                                                            <p>
                                                                {{ $record['content'] }}
                                                            </p>
                                                        </div>
                                                    </div>
{{--                                                    <div id="wPDNL12NIEVLFCXN" class="mwPageBlock Button" style="">--}}
{{--                                                        <div class="blockContents">--}}
{{--                                                            <div class="mwBtnLeft">--}}
{{--                                                                <div class="btn btnYellow btnOutline btnRounded">--}}
{{--                                                                    <a href="#" template="default" class="medium" target="_self">Learn more</a>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    <div class="Clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="twoColRight twoColFirst col-lg-6">
                                            <div class="twoColImg">
                                                <div id="wKN61FM35Z0PH4J3" class="mwPageBlock File" style="">
                                                    <div class="blockContents">
                                                        <div class="stretchImg _bg-stretch" role="img" aria-label="Alumni.jpg" style="background-image: url({{ asset('storage/'.$record['image']) }});"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                    @if($record['type'] == 'button')
                        <div class="blockContents">
                            <div class="mwBtnCenter">
                                @foreach ($record['button_columns'] as $button)
                                    <div class="btn {{ $button['style'] == 'outline' ? 'btnOutline': 'btnYellow'}} btnRounded">
                                        <a href="{{$button['url']}}" class="medium" target="{{$button['target']}}">{{$button['label']}}</a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                    @if($record['type'] == 'images')
                        <div id="wQFF0QXSJFIAIUY0" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h3>
                                    {{ $record['title'] }}
                                </h3>
                            </div>
                        </div>
                        <div class="blockContents">
                            @foreach ($record['images'] as $image)
                                <div class="mwFileEmbed Image" style="overflow:hidden">
                                    <img id="image" src="{{ asset('storage/'.$image) }}" class="mwFile Image full imgEd" style="display: block; border:none;width:100%; margin: 0 0;" alt="PasinosSigning-11.jpg">
                                </div>
                                <div class="blockContents">
                                    <div class="mwSpacer hor" style="height:20px;"></div>
                                </div>
                            @endforeach

                            <script type="text/javascript">
                                (function () {
                                    // Small timeout for browser to catch up
                                    //	setTimeout(function() {

                                    // Getting image to setup
                                    var $img = document.getElementById('image_I1SSWXHHDV32GZIY');
                                    mwLoadImage($img, 960, 639);

                                    //	}, 1);
                                })();
                            </script>
                        </div>
                    @endif
                    @if($record['type'] == 'pdf')
                            @if($record['title'])
                                <div id="wUVFRIOU0CD5T6E5" class="mwPageBlock Content" style="">
                                    <div class="blockContents  pad-top-l">
                                        <h3>
                                            {{ $record['title'] }}
                                        </h3>
                                    </div>
                                </div>
                            @endif
                            @foreach ($record['pdf'] as $pdf)
                                <x-embed-pdf :pdf="asset('storage/'.$pdf)" />
                            @endforeach
                    @endif
                    @if($record['type'] == 'downloads')
                            <div class="blockContents">
                                <div class="lightGreyContent">
                                    <div class="mwPageArea">
                                        <div id="wQFF0QXSJFIAIUY0" class="mwPageBlock Content" style="">
                                            <div class="blockContents">
                                                <h3>
                                                    {{ $record['title'] }}
                                                </h3>
                                            </div>
                                        </div>
                                        <div id="wUEYFWC0P5PSDYGI" class="mwPageBlock Gallery" style="">
                                            <div class="blockContents">
                                                <div class="fileDownloadWrap">
                                                    @foreach ($record['downloads'] as $download)
                                                        <div class="fileDownload">
                                                            <p>{{ $download['title'] }}</p>
                                                            <p><a href="{{asset('storage/'.$download['file'])}}">Download File</a></p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <script type="text/javascript">
                                                    jQuery( function () { mwInitMedia('#wUEYFWC0P5PSDYGI') } );
                                                </script>
                                            </div>
                                        </div>
                                        <div class="Clear"></div>
                                    </div>
                                </div>
                            </div>
                    @endif
                @endforeach

                <div class="Clear"></div>
            </div>
        </div>
    </div>
</div>

