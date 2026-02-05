@extends('layouts.front')

@section('content')
@include('includes.frontnavbar')

<!--Page Header Start-->
<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('front/assets/images/backgrounds/page-header-bg.jpg') }});">
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
            <h2>Corporate Identity</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-right-arrow"></span></li>
                <li>Corporate Identity</li>
            </ul>
        </div>
    </div>
</section>
<!--Page Header End-->

<section class="why-choose-two">
    <div class="why-choose-two__shape-3 img-bounce">
        <img src="{{ asset('front/assets/images/shapes/why-choose-two-shape-3.png') }}" alt="">
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6">
                <div class="why-choose-two__left">
                    <div class="section-title-three text-left">
                        <div class="section-title-three__tagline-box">
                        </div>
                        <h2 class="section-title-three__title">Corporate Identity</h2>
                        
                    </div>

                    <ul class="why-choose-two__points list-unstyled">
                        <!-- Vision -->
                        <li>
                            <div class="icon">
                                <span class="icon-solution"></span>
                            </div>
                            <div class="content">
                                <h3>Vision</h3>
                                <p>To be a vibrant provider of competitive pensions by 2030.</p>
                            </div>
                        </li>

                        <!-- Mission -->
                        <li>
                            <div class="icon">
                            <span class="icon-solution"></span>
                            </div>
                            <div class="content">
                                <h3>Mission</h3>
                                <p>To deliver value and quality of life in retirement to our members through:</p>

                                <ul class="list-unstyled" style="margin-top: 10px; padding-left: 0;">
                                    <li style="display:flex; gap:10px; margin-bottom:8px;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Equitable pension benefits to members and their dependents.</span>
                                    </li>
                                    <li style="display:flex; gap:10px; margin-bottom:8px;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Quality service to all our clients.</span>
                                    </li>
                                    <li style="display:flex; gap:10px; margin-bottom:0;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Efficient and transparent administration of the Fund.</span>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <!-- Values -->
                        <li>
                            <div class="icon">
                                <span class="icon-woman"></span>
                            </div>
                            <div class="content">
                                <h3>Values</h3>

                                <ul class="list-unstyled" style="margin-top: 10px; padding-left: 0;">
                                    <li style="display:flex; gap:10px; margin-bottom:8px;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Professionalism</span>
                                    </li>
                                    <li style="display:flex; gap:10px; margin-bottom:8px;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Quality Service</span>
                                    </li>
                                    <li style="display:flex; gap:10px; margin-bottom:8px;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Teamwork</span>
                                    </li>
                                    <li style="display:flex; gap:10px; margin-bottom:8px;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Integrity</span>
                                    </li>
                                    <li style="display:flex; gap:10px; margin-bottom:8px;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Accountability</span>
                                    </li>
                                    <li style="display:flex; gap:10px; margin-bottom:0;">
                                        <span class="icon-check" style="margin-top:4px;"></span>
                                        <span>Innovation</span>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="col-xl-6">
                <div class="why-choose-two__right">
                    <div class="why-choose-two__img wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">
                        <img src="{{ asset('front/assets/images/resources/why-choose-two-img-1.jpg') }}" alt="">
                        <div class="why-choose-two__shape-1 float-bob-y">
                            <img src="{{ asset('front/assets/images/shapes/why-choose-two-shape-1.png') }}" alt="">
                        </div>
                        <div class="why-choose-two__shape-2 zoominout">
                            <img src="{{ asset('front/assets/images/shapes/why-choose-two-shape-2.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@include('includes.frontfooter')
@endsection
