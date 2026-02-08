@extends('layouts.front')

@section('content')
@include('includes.frontnavbar')

<section class="page-header page-header--small">
    <div class="page-header__bg"
         style="background-image: url({{ asset('front/assets/images/backgrounds/page-header-bg.jpg') }});">
    </div>
    <div class="page-header__shape-1 float-bob-y">
        <img src="{{ asset('front/assets/images/shapes/page-header-shape-1.png') }}" alt="">
    </div>
    <div class="page-header__shape-2 float-bob-x">
        <img src="{{ asset('front/assets/images/shapes/page-header-shape-2.png') }}" alt="">
    </div>
    <div class="page-header__shape-3 float-bob-y">
        <img src="{{ asset('front/assets/images/shapes/page-header-shape-3.png') }}" alt="">
    </div>
    <div class="page-header__shape-4 float-bob-x">
        <img src="{{ asset('front/assets/images/shapes/page-header-shape-4.png') }}" alt="">
    </div>
    <div class="container">
    <div class="page-header__inner">
            <h2>{{ $post->title }}</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li>Posts/News</li>
            </ul>
        </div>
    </div>
</section>
<style>
/* Smaller page header */
.page-header--small {
    min-height: 260px;   /* default is usually 400–500px */
    padding: 80px 0 70px;
}

.page-header--small .page-header__bg {
    background-position: center;
    background-size: cover;
}

   </style> 
<section class="news-details">
    <div class="container" style="padding: 60px 0;">
        <h1>{{ $post->title }}</h1>

        <p style="margin-top: 10px;">
            <strong>By:</strong> {{ $post->author_name }}
            &nbsp; | &nbsp;
            <strong>Date:</strong> {{ ($post->published_at ?? $post->created_at)->format('d M Y') }}
        </p>

        @if(!empty($post->image))
            <div style="margin: 25px 0;">
                <img src="{{ asset('storage/'.$post->image) }}" alt="" style="max-width: 100%; border-radius: 12px;">
            </div>
        @endif

        <div>
            {!! $post->body !!}
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('home') }}#news">← Back to News</a>
        </div>
    </div>
</section>

@include('includes.frontfooter')
@endsection
