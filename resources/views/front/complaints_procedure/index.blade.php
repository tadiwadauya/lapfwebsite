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
            <h2>{{ $page->title }}</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li>{{ $page->title }}</li>
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

<section style="padding:70px 0;">
    <div class="container text-center">

        @if($page->image)
            <img src="{{ asset('storage/'.$page->image) }}"
                 alt="{{ $page->title }}"
                 style="max-width:100%; height:auto; border-radius:16px; box-shadow:0 15px 40px rgba(0,0,0,.15);">
        @else
            <div class="alert alert-info">No image uploaded yet.</div>
        @endif

    </div>
</section>

@include('includes.frontfooter')
@endsection
