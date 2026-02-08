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
            <h2>{{ $settings->page_title }}</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li>{{ $settings->breadcrumb_title }}</li>
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

<!--Information Start-->
<section class="information">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                <div class="information__single">
                    <div class="information__icon">
                        <span class="icon-phone-call"></span>
                    </div>
                    <p class="information__text">VOIP line, </p>
                    <p class="information__number">{{ $settings->chat_subtitle }}</p>
                    @if($settings->phone_link)
                        <a href="{{ $settings->phone_link }}" class="information__btn">
                            {{ $settings->phone_button_text }}<span class="icon-phone-call"></span>
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="information__single">
                    <div class="information__icon">
                        <span class="icon-phone-call"></span>
                    </div>
                    <p class="information__text">{{ $settings->phone_title }}</p>
                    <p class="information__number">
                        @if($settings->phone_link)
                            <a href="#">{{ $settings->phone_number }}</a>
                        @else
                            {{ $settings->phone_number }}
                        @endif
                    </p>
                    @if($settings->phone_link)
                        <a href="#" class="information__btn">
                            {{ $settings->phone_button_text }}<span class="icon-phone-call"></span>
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                <div class="information__single">
                    <div class="information__icon">
                        <span class="icon-location-2"></span>
                    </div>
                    <p class="information__text">Postal Adress</p>
                    <p class="information__number">
                        @if($settings->email_address)
                            <a href="#">{{ $settings->email_address }}</a>
                        @endif
                    </p>
                    @if($settings->email_address)
                        <a href="#" class="information__btn">
                            {{ $settings->email_button_text }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                <div class="information__single">
                    <div class="information__icon">
                        <span class="icon-location-2"></span>
                    </div>
                    <p class="information__text">{{ $settings->address_title }}</p>
                    <p class="information__number">{{ $settings->office_address }}</p>
                    @if($settings->directions_url)
                        <a href="{{ $settings->directions_url }}" class="information__btn" target="_blank">
                            {{ $settings->directions_button_text }}<span class="icon-right-arrow1"></span>
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
<!--Information End-->

<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="contact-page__left">
                    <h3 class="contact-page__title">{{ $settings->form_title }}</h3>
                    <p class="contact-page__sub-title">{{ $settings->form_subtitle }}</p>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="contact-page__form-box">
                        <form action="{{ route('contact.submit') }}" method="POST" class="contact-page__form" novalidate>
                            @csrf
                            <div class="row">

                                <div class="col-xl-12">
                                    <div class="contact-page__input-box">
                                        <h3 class="contact-page__input-title">Full Name *</h3>
                                        <input type="text" placeholder="John Smith" name="name" value="{{ old('name') }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="contact-page__input-box">
                                        <h3 class="contact-page__input-title">Email *</h3>
                                        <input type="email" placeholder="e.g: you@email.com" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="contact-page__input-box">
                                        <h3 class="contact-page__input-title">Phone Number</h3>
                                        <input type="text" placeholder="+263..." name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="contact-page__input-box">
                                        <h3 class="contact-page__input-title">Subject</h3>
                                        <input type="text" name="subject" placeholder="Subject..." value="{{ old('subject') }}">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="contact-page__input-box text-message-box">
                                        <h3 class="contact-page__input-title">Message <span>(Optional)</span></h3>
                                        <textarea name="message" placeholder="Type here...">{{ old('message') }}</textarea>
                                    </div>

                                    <div class="contact-page__btn-box">
                                        <button type="submit" class="thm-btn contact-page__btn">
                                            <span class="fas fa-paper-plane"></span> SEND MESSAGE
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="result"></div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="contact-page__right">
                    @if($settings->map_iframe_src)
                        <iframe
                            src="{{ $settings->map_iframe_src }}"
                            class="google-map__one"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                        ></iframe>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>
<!--Contact Page End-->

@include('includes.frontfooter')
@endsection
