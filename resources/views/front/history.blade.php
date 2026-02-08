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
    <h2>History</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><span class="icon-down-arrow"></span></li>
                        <li>History</li>
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


        <section class="company-history">
            <div class="container">
                <div class="company-history__inner">
                    <div class="company-history__down-arrow">
                        <span class="icon-down-arrow-1"></span>
                    </div>
					<br>
					          <p class="company-history__title">THE LOCAL AUTHORITIES PENSION FUND (LAPF) WAS ESTABLISHED ON 1 JULY 1950 AS A SELF ADMINISTERED DEFINED BENEFIT SCHEME AND REGISTERED IN TERMS OF THE PENSION AND PROVIDENT FUNDS ACT CHAPTER 24.09. CURRENTLY 34 LOCAL AUTHORITIES CONTRIBUTE TO THE FUND.</p>
                           
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="company-history__left">
                                <ul class="company-history__list list-unstyled">
                                    <li>
                                        <div class="company-history__list-single">
                                            <div class="company-history__list-shape-11"></div>
                                            <div class="company-history__list-shape-box">
                                                <div class="company-history__list-shape-1"></div>
                                            </div>
                                           
                                            <h3 class="company-history__title">THE ENABLING ACT WAS ENACTED IN 1949 AND OPERATIONS COMMENCED ON 1 JULY 1950.</h3>
                                           
                                            <div class="company-history__arrow">
                                               <a href="#"><img src="{{ asset('front/assets/images/project/scroll1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="company-history__list-single">
                                            <div class="company-history__list-shape-11"></div>
                                            <div class="company-history__list-shape-box">
                                                <div class="company-history__list-shape-1"></div>
                                            </div>
                                            <h3 class="company-history__title">INITIAL BALANCE SHEET SIZE-US$300,000.00.</h3>
                                    
                                            <div class="company-history__arrow">
                                                <a href="#"><img src="{{ asset('front/assets/images/project/money1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                       
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="company-history__right">
                                <ul class="company-history__list list-unstyled">
                                    <li>
                                        <div class="company-history__list-single">
                                            <div class="company-history__list-shape-11"></div>
                                            <div class="company-history__list-shape-box">
                                                <div class="company-history__list-shape-1"></div>
                                            </div>
                                            <h3 class="company-history__title">LAPF HAS BEEN IN EXISTENCE FOR MORE THAN 70 YEARS.</h3>
                                           
                                            <div class="company-history__arrow">
                                                <a href="#"><img src="{{ asset('front/assets/images/project/70year.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="company-history__list-single">
                                            <div class="company-history__list-shape-11"></div>
                                            <div class="company-history__list-shape-box">
                                                <div class="company-history__list-shape-1"></div>
                                            </div>
                                            <h3 class="company-history__title">INITIAL MEMBERSHIP – 422.</h3>
                                            <div class="company-history__arrow">
                                                <a href="#"><img src="{{ asset('front/assets/images/project/membership1.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>
                                   <li>
                                        <div class="company-history__list-single">
                                            <div class="company-history__list-shape-11"></div>
                                            <div class="company-history__list-shape-box">
                                                <div class="company-history__list-shape-1"></div>
                                            </div>
                                            <h3 class="company-history__title">CURRENT ACTIVE MEMBERS AND PENSIONERS – OVER 30 000.</h3>
                                            <div class="company-history__arrow">
                                               <a href="#"><img src="{{ asset('front/assets/images/project/membership3.jpg') }}" alt=""></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@include('includes.frontfooter')
@endsection