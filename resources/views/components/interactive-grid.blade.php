@props([
    'title' => null,
    'columns' => [],
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
                            <img src="{{ asset('storage/'.$column['image']) }}" height="50" />
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
