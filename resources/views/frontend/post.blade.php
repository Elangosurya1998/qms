@extends('frontend.layouts.subpage')
@section('title', $post->title)
@section('content')
    <!-- Start page-content -->
    <div class="main-content">

        <div class="main-content">
            <!-- Breadcrumbs Start -->
            <div class="rs-breadcrumbs breadcrumbs-overlay">
                <div class="breadcrumbs-img">
                    <img src="{{ asset('frontend/images/bg/newsletter-bg.jpg') }}" alt="Breadcrumbs Image">
                </div>
                <div class="breadcrumbs-text white-color">
                    <h1 class="page-title">{{ $post->title }}</h1>
                    <ul>
                        <li>
                            <a class="active" href="{{ url('/') }}">Home</a>
                        </li>
                        <li>{{ $post->title }}</li>
                    </ul>
                </div>
            </div>

            <section class="pt-105 pb-110">
                <div class="container">
                    <div class="section-content">
                        @if ($post->feature_image)
                            <img width="300px" height="300px"
                                src="{{ asset($post->feature_image ? asset('storage/' . $post->feature_image) : asset('assets/img/news-events/1.JPG')) }}"
                                alt="Featured Image">
                        @else
                            <img src="{{ asset('assets/assets/images/dummy.jpg') }}" style="width:200px; height:200px;"
                                alt="Featured Image">
                        @endif

                        <p>{{ $post->excerpt }}</p>
                        <br>
                        @if (!empty($post->content))

                            @foreach ($post->content as $block)
                                @php
                                    $dataBlock = $block['data'];
                                    $content = data_get($dataBlock, 'content');
                                    $alt = data_get($dataBlock, 'alt');
                                    $image = data_get($dataBlock, 'image');
                                    $images = data_get($dataBlock, 'images');
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

                                    {{-- @case('image')
                                    @if ($post->mediaImage)
                                        <img src="{{ asset("storage/{$post->mediaImage->path}") }}" alt="{{ $alt }}">
                                    @endif
                                @break

                                @case('Multiple Images')
                                    @if ($images && count($images) > 0)
                                        @foreach ($images as $image)
                                            @php 
                                                $imagePath = \App\Helpers\Common::getImage($image);
                                            @endphp
                                             <img src="{{ asset("storage/{$imagePath}") }}" alt="{{ $alt }}">
                                        @endforeach
                                    @endif
                                @break --}}
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

        </div>
        <!-- end page-content -->
    @endsection
