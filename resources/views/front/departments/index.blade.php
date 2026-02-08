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
            <h2>Departments</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li><a href="{{ route('front.departments') }}">Departments</a></li>
               
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

<section class="services-three">
    <div class="services-three__shape-1 float-bob-y">
        <img src="{{ asset('front/assets/images/shapes/services-three-shape-1.png') }}" alt="">
    </div>
    <div class="services-three__shape-2 zoominout">
        <img src="{{ asset('front/assets/images/shapes/services-three-shape-2.png') }}" alt="">
    </div>

    <div class="container">
        <div class="section-title-three text-center">
            <div class="section-title-three__tagline-box">
                <p class="section-title-three__tagline">The Fund has the following departments / sections; Pensions Administration, Properties Management, Finance, Information Technology, Corporate Services, Internal Audit and Procurement.</p>
            </div>
            <h2 class="section-title-three__title">The Fund Departments / Sections</h2>
        </div>

        <div class="row">
            @forelse($departments as $i => $d)
                @php
                    $delay = (($i % 4) + 1) * 100;
                    $wowClass = ($i % 2 == 0) ? 'fadeInUp' : 'fadeInDown';
                    $icon = $d->icon ?: 'icon-report';
                    $text = $d->short_description ?: \Illuminate\Support\Str::limit(strip_tags($d->description ?? ''), 110);
                @endphp

                <div class="col-xl-4 col-lg-6 col-md-6 wow {{ $wowClass }}" data-wow-delay="{{ $delay }}ms">
                    <div class="services-three__single">
                        <h3 class="services-three__title">
                            <a href="{{ route('front.departments.show', $d->slug) }}">{{ $d->name }}</a>
                        </h3>

                        <div class="services-three__icon">
                            <span class="{{ $icon }}"></span>
                        </div>

                        <p class="services-three__text">{{ $text }}</p>

                        <div class="services-three__btn">
                            <a href="{{ route('front.departments.show', $d->slug) }}">
                                Learn More<span class="icon-right-arrow1"></span>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No departments available yet.</div>
                </div>
            @endforelse
        </div>

        <p class="services-three__bottom-text">
            You Can Also <a href="{{ route('front.departments') }}" class="all-services">See All<span class="icon-right-arrow-11"></span></a>
            <a href="{{ route('front.departments') }}">Departments</a>
        </p>
    </div>
</section>

@include('includes.frontfooter')
@endsection
