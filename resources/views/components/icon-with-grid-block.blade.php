@props([
    'id' => null,
    'iconImage' => null,
    'backgroundColor' => null,
    'backgroundImage'=> null,
    'columnTextOne'=> null,
    'columnTextTwo'=> null,
    'columnTextThree'=> null
])
<div id="wI3QA5FB3MG2GMIN" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <style type="text/css">
            #contentArea-{{$id}} {
                background-image:  url("storage/{{$backgroundImage}}");
                background-position: center;
                background-size: auto;
                background-repeat: no-repeat;
            }
        </style>
        <div id="contentArea-{{$id}}" class="contentArea contentAreaMedium {{ $backgroundColor == null ? '_bg-gray-dark' : '_bg-white' }} content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="wU7WE09ND3V14RRU" class="mwPageBlock Include" style="">
                            <div class="blockContents">
                                <!-- Sidebar Left -->
                                <div class="sidebar sidebarLeft">
                                    <div class="sidebarWrap">
                                        <div class="row">
                                            <!-- Sidebar Side -->
                                            <div class="sidebarSide col-lg-3">
                                                <div class="sidebarSideWrap">
                                                    <!-- Sidebar Open -->
                                                    <button class="sidebarOpen" aria-disabled="false">Open Sidebar <i class="fas fa-bars"></i></button>
                                                    <!-- Sidebar Inner -->
                                                    <div class="sidebarInner">
                                                        <!-- Sidebar Close -->
                                                        <button class="sidebarClose" aria-disabled="true"><i class="fas fa-times"></i></button>
                                                        <!-- Sidebar Side Content -->
                                                        <div class="mwPageArea">
                                                            <div id="w50J8WNAEBPU3FYE" class="mwPageBlock Content" style="">
                                                                <div class="blockContents">
                                                                    <h3>
                                                                        <a id="basics"></a>BFC: The Basics
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="Clear"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Sidebar Main -->
                                            <div class="sidebarMain col-lg-9">
                                                <div class="sidebarMainWrap">
                                                    <div class="sidebarInner">
                                                        <!-- Sidebar Main Content -->
                                                        <div class="mwPageArea">
                                                            @if($iconImage)
                                                                <div id="wCVPY5ABDQ4JPL3G" class="mwPageBlock File" style="">
                                                                    <div class="blockContents">
                                                                        <div class="mwFileEmbed Image" style="overflow:hidden">
                                                                            <img id="image_{{$id}}" src="{{ asset('storage/'.$iconImage) }}" class="mwFile Image full imgEd " style="display: block; border: none; width: 100%; margin: 0px 0%;" alt="Untitled_design_(6).png">
                                                                        </div>
                                                                        <script type="text/javascript">
                                                                            (function () {
                                                                                // Small timeout for browser to catch up
                                                                                //	setTimeout(function() {

                                                                                // Getting image to setup
                                                                                var $img = document.getElementById('image_{{$id}}');
                                                                                mwLoadImage($img, 960, 139);

                                                                                //	}, 1);
                                                                            })();
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <div id="wJYZX7PBZNQRDBG9" class="mwPageBlock Spacer" style="">
                                                                    <div class="blockContents">
                                                                        <div class="mwSpacer hor" style="height:50px;"></div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div id="wOFNV6B10LXFF6I8" class="mwPageBlock Include" style="">
                                                                <div class="blockContents">
                                                                    <div class="threeCol row">
                                                                        <div class="threeColItem col-lg-4 col-md-6">
                                                                            <div class="mwPageArea">
                                                                                <div id="w0YYUFBI43M2M48V" class="mwPageBlock Content" style="">
                                                                                    <div class="blockContents">
                                                                                        {!! str($columnTextOne)->markdown()->sanitizeHtml() !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="Clear"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="threeColItem col-lg-4 col-md-6">
                                                                            <div class="mwPageArea">
                                                                                <div id="wZOF5DM0JRU3HIJO" class="mwPageBlock Content" style="">
                                                                                    <div class="blockContents">
                                                                                        {!! str($columnTextTwo)->markdown()->sanitizeHtml() !!}
                                                                                    </div>
                                                                                </div>
                                                                                <div class="Clear"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="threeColItem col-lg-4">
                                                                            <div class="mwPageArea">
                                                                                <div id="wJ12SXQ0HXASYP2N" class="mwPageBlock Content" style="">
                                                                                    <div class="blockContents">
                                                                                        {!! str($columnTextThree)->markdown()->sanitizeHtml() !!}
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
