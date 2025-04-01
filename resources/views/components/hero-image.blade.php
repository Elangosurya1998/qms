@props([
    'id' => '',
    'class' => '',
    'backgroundImage' =>'frontend/files/_cache/22af7f7acf114d23f1b578e2264590e2.jpg',
    'title' => 'Not Found',
    'description' => 'No Description',
])

<div
    id="{{ $id }}"
    class="mwPageBlock File {{ $class }}"
    style="background: url('{{ $backgroundImage }}') center center no-repeat; background-size:cover !important;"
>
    <div class="blockContents">
        <div class="pageBanner pageBannerSimple"
             style="background: url('{{ $backgroundImage }}') center center no-repeat; background-size:cover !important;">
            <div class="pageBannerWrap">
                <div class="pageBannerContent">
                    <div class="container">
                        <div class="pageBannerInner">
                            <h1 class="pageBannerTitle">
                                {{ $title }}
                            </h1>
                            <p>{{ $description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
