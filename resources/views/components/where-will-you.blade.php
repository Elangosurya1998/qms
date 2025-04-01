@props([
    'title' => 'Where will you venture to?', // Title for the section
    'columns' => [
        [
            'title' => 'Academics',
            'link' => 'Academics-departments.html',
            'image' => asset('frontend/images/Academics.png')
        ],
        [
            'title' => 'Athletics',
            'link' => 'Athletics.html',
            'image' => asset('frontend/images/Athletics.png')
        ],
        [
            'title' => 'Extracurricular',
            'link' => 'Extracurricular-Activities.html',
            'image' => asset('frontend/images/Extracurricular.png')
        ]
    ],
])

<div id="wYUZENJ1BLR5EODN" class="mwPageBlock Include" style="">
    <div class="blockContents">
        <div class="homeFourColumnWrap">
            <div class="homeFourColumn">

                {{-- Section Title --}}
                <div class="homeFourCol">{{ $title }}</div>

                {{-- Dynamically Render Columns --}}
                @foreach ($columns as $column)
                    <div class="homeFourCol trans">
                        <a href="{{ $column['link'] }}">
                            <img src="{{ $column['image'] }}" />
                            <h4>{{ $column['title'] }}</h4>
                            <div class="plus trans">+</div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<x-progress />
