@props([
    'title' => 'Quick Menu',
    'backgroundImage' => '', // 'frontend/files/_cache/22af7f7acf114d23f1b578e2264590e2.jpg'
    'menuItems' => [
        [ 'title' => 'Fundraising & Events', 'link' => '/Fundraising-and-Events' ],
        [ 'title' => 'Ways to Give', 'link' => '/Ways-to-Give' ],
        [ 'title' => 'Tuition Angels', 'link' => '/Tuition-Angels' ],
        [ 'title' => 'Annual Fund', 'link' => '/Annual-Fund' ],
    ],
])

<div id="w0NYABIX221YCAFP" class="mwPageBlock Include" style="">
    <div class="blockContents">

        <style type="text/css">
            #contentArea-QV63NR {
                background-image: url('{{ $backgroundImage }}');
                background-position: center;
                background-size: auto;
                background-repeat: no-repeat;
            }
        </style>

        <div id="contentArea-QV63NR" class="contentArea contentAreaLarge _bg-gray-light content-style">
            <div class="contentAreaWrap">
                <div class="container">
                    <div class="mwPageArea">
                        <div id="w1CEIR83R8DOJGMV" class="mwPageBlock Content" style="">
                            <div class="blockContents"><h3 style="text-align: center;">
                                    Where will you venture to next?
                                </h3>
                            </div>
                        </div>
                        <div id="w52TFSKOJJE1SSOG" class="mwPageBlock Include" style="">
                            <div class="quickMenuHolder">
                                <h5>{{ $title }}</h5>
                                <div class="qmHolder">
                                    <ul>
                                        @foreach ($menuItems as $item)
                                            <li class="no-children">
                                                <a href="{{ $item['link'] }}">
                                                    <span class="Title">{{ $item['title'] }}</span>
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
