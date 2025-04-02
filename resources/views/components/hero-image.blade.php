@props([
    'backgroundImage' => null,
    'title' => null,
    'description' => null,
])

<div
    class="mwPageBlock File"
    style="background: url('storage/{{ $backgroundImage }}') center center no-repeat; background-size:cover !important;"
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
