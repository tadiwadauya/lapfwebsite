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
        <h2>Pensioners</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li>Pensioners</li>
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
<section class="portfolio-three" style="padding:70px 0;">
    <div class="container">
        <div class="row">

            @forelse($images as $i => $img)
                <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp"
                     data-wow-delay="{{ (($i % 4) + 1) * 100 }}ms">

                    <div class="portfolio-three__single">

                        <div class="portfolio-three__img-box a4-frame">
                            <div class="portfolio-three__img">
                                <img src="{{ asset('storage/'.$img->image) }}"
                                     alt="{{ $img->title ?? 'Pensioner' }}">
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No pensioner images uploaded yet.</div>
                </div>
            @endforelse

        </div>
    </div>
</section>


@include('includes.frontfooter')
@endsection
