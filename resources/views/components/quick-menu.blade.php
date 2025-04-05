@props([
    'blockContents' => null,
    'title' => null,
    'backgroundImage' => null, // 'frontend/files/_cache/22af7f7acf114d23f1b578e2264590e2.jpg'
    'quickMenus' => [],
    'position' => null
])
<div id="w0NYABIX221YCAFP" class="mwPageBlock Include" style="">
    <div class="blockContents">

        <div  class="contentArea contentAreaLarge {{ $position == 'bottom' ? '_bg-gray-light' : ''}} content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="w1CEIR83R8DOJGMV" class="mwPageBlock Content" style="">
                            <div class="blockContents">
                                <h3 style="text-align: center;">
                                    {{ $blockContents }}
                                </h3>
                            </div>
                        </div>
                        <div id="w52TFSKOJJE1SSOG" class="mwPageBlock Include" style="">
                            <div class="quickMenuHolder">
                                <h5>{{ $title }}</h5>
                                <div class="qmHolder">
                                    <ul>
                                        @foreach ($quickMenus as $quickMenu)
                                            @php
                                                [$slug, $title] = explode(':', $quickMenu);
                                            @endphp

                                            <li class="no-children">
                                                <a href="{{ $slug }}">
                                                    <span class="Title">{{ $title }}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
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
