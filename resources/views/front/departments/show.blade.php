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
            <h2>{{ $department->name }}</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li><a href="{{ route('front.departments') }}">Departments</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li>{{ $department->name }}</li>
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
    <div class="container">
        <div class="card p-4" style="border-radius:16px; box-shadow:0 12px 30px rgba(0,0,0,.07);">
            <h3 style="font-weight:900;">{{ $department->name }}</h3>
            <div style="margin-top:12px; color:#6b7280; line-height:1.8;">
                {!! nl2br(e($department->description ?? 'No description added yet.')) !!}
            </div>

            <div style="margin-top:20px;">
                <a href="{{ route('front.departments') }}" class="thm-btn">Back to Departments</a>
            </div>
        </div>
    </div>
</section>

@include('includes.frontfooter')
@endsection
