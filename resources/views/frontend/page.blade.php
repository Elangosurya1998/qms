@extends('frontend.layouts.subpage')
@section('title', $page->title)
@section('content')

    <section id="slider" class="hero p-0 odd featured">
        <div class="swiper-container no-slider animation slider-h">
            <div class="swiper-wrapper">
                <!-- Item 1 -->
                <div class="swiper-slide slide-center">
                    <!-- Media -->
                    <img src="{{ asset('frontend/images/bg-wide.jpg') }}" alt="Full Image" class="full-image" data-mask="80">
                    <div class="slide-content row text-center">
                        <div class="col-12 mx-auto inner">
                            <!-- Breadcrumb Section -->
                            <div class="rs-breadcrumbs breadcrumbs-overlay">
                                <div class="breadcrumbs-img">
                                    <img src="{{ asset('frontend/images/bg/newsletter-bg.jpg') }}" alt="Breadcrumbs Image">
                                </div>
                                <div class="breadcrumbs-text white-color">
                                    <h3 class="page-title">{{ $page->title }}</h3>
                                    <ul>
                                        <li>
                                            <a class="active" href="{{ url('/') }}">Home</a>
                                        </li>
                                        @foreach ($breadcrumbs as $breadcrumb)
                                            <li class="{{ $loop->last ? 'active' : '' }}">
                                                @if (!$loop->last)
                                                    <a href="{{ $breadcrumb['url'] }}">{{ $breadcrumb['name'] }}</a>
                                                @else
                                                    {{ $breadcrumb['name'] }}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Section: About -->
    <section class="pt-105 pb-110">
        <div class="container">
            <div class="section-content">
                {{-- <h2 class="">{{ $page->title }}</h2> --}}

                @if ($page->feature_image)
                    <img src="{{ asset("storage/$page->feature_image") }}" style="width:200px !important; height:200px;"
                        alt="Featured Image">
                @endif

                <p>{{ $page->excerpt }}</p>
                <br>
                @if (!empty($page->content))
                    @foreach ($page->content as $block)
                        @php
                            $dataBlock = $block['data'];
                            $content = data_get($dataBlock, 'content');
                            $alt = data_get($dataBlock, 'alt');
                            $url = data_get($dataBlock, 'url');
                            $level = data_get($dataBlock, 'level');
                        @endphp
                        @switch($block['type'])
                            @case('heading')
                                {!! "<$level>$content</$level>" !!}
                            @break

                            @case('Rich Editor')
                                {!! $content !!}
                            @break

                            @case('TipTap Editor')
                                {!! tiptap_converter()->asHTML($content) !!}
                            @break

                            @case('image')
                                @if ($url)
                                    <img src="{{ asset("storage/$url") }}" alt="{{ $alt }}">
                                @endif
                            @break

                            @case('Multiple Images')
                                @if (is_array($url) && count($url))
                                    @foreach ($url as $item)
                                        <img src="{{ asset("storage/$item") }}" alt="{{ $alt }}">
                                    @endforeach
                                @endif
                            @break

                            @default
                                <div>{{ 'Block type not recognized.' }}</div>
                        @endswitch
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- Load Activities section only if the page is 'activities' -->
    @if (!empty($activities) && $page->slug === 'activities')

        <section class="about-page1-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 blog-pull-right">
                        @foreach ($activities as $activity)
                            <div class="row mb-15">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumb">
                                        <img style ="width:50% !important" alt="{{ $activity->title ?? '' }}"
                                            src="{{ $activity->feature_image ? asset('storage/' . $activity->feature_image) : asset('assets/images/news/news.jpg') }}"
                                            class="img-fullwidth">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <h4 class="line-bottom mt-0 mt-sm-20">{{ $activity->title }}</h4>
                                    <p>{{ Str::limit($activity->excerpt ?? '', 150) }}</p>
                                    <a class="default-big-btn disabled" href="{{ $activity->slug_url ?? '' }}">view
                                        details</a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif
    </div>
    <!-- end page-content -->
@endsection
