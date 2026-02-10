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
        </div> <div class="container">
        <div class="page-header__inner">
            <h2>Active Members</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li>Active Members</li>
            </ul>
        </div>
    </div>
</section>

<style>

.page-header--small {
    min-height: 260px;   /* default is usually 400–500px */
    padding: 80px 0 70px;
}

.page-header--small .page-header__bg {
    background-position: center;
    background-size: cover;
}
    /* SECTION SPACING */
    .am-section{
        padding: 70px 0;
    }

    /* STACK: one after another */
    
</style>

<section class="am-section">
    <div class="container">
        @if($images->count())
            <div class="am-stack">
                @foreach($images as $i => $img)
                    <div class="am-card wow fadeInUp" data-wow-delay="{{ (($i % 4)+1) * 80 }}ms">
                        <img class="am-img"
                             src="{{ asset('storage/'.$img->image) }}"
                             alt="{{ $img->title ?? 'Active Member' }}">

                        @if(!empty($img->title))
                            <div class="am-caption">
                                <h4>{{ $img->title }}</h4>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info">No images uploaded yet.</div>
        @endif
    </div>
</section>

@include('includes.frontfooter')
@endsection
