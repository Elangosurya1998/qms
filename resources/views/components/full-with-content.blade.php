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
                        <div id="wSAMXWBVTHPCO3KQ" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                {!! str($record['column_1'])->sanitizeHtml() !!}
                            </div>
                        </div>
                    @endif
                    @if($record['type'] == 'button')
                        <div class="blockContents">
                            <div class="mwBtnCenter">
                                @foreach ($record['button_columns'] as $button)
                                    <div class="btn {{ $button['style'] == 'outline' ? 'btnOutline': 'btnYellow'}} btnRounded">
                                        <a href="{{$button['url']}}" template="default" class="medium" target="{{$button['target']}}">{{$button['label']}}</a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endif
                    @if($record['type'] == 'images')
                        <div class="blockContents">
                            @foreach ($record['images'] as $image)
                                <div class="mwFileEmbed Image" style="overflow:hidden">
                                    <img id="image" src="{{ asset('storage/'.$image) }}" class="mwFile Image full imgEd" style="display: block; border:none;width:100%; margin: 0 0%;" alt="PasinosSigning-11.jpg">
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
                                            BFC Breakfast Menu
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
