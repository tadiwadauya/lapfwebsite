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
    .page-header--small {
        min-height: 260px;
        padding: 80px 0 70px;
    }
    .page-header--small .page-header__bg {
        background-position: center;
        background-size: cover;
    }

    .fp-wrap{ padding: 70px 0; }

    /* A4 cover */
    .fp-cover-a4{
        width: min(780px, 100%);
        margin: 0 auto 22px auto;
        aspect-ratio: 1 / 1.414; /* A4 portrait */
        background: #f8fafc;
        border-radius: 18px;
        padding: 14px;
        box-shadow: 0 15px 40px rgba(0,0,0,.14);
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .fp-cover-a4 img{
        width: 100%;
        height: 100%;
        object-fit: contain; /* no cutting */
        background: #fff;
        border-radius: 12px;
        display: block;
    }

    .fp-actions{
        display:flex;
        gap: 10px;
        flex-wrap: wrap;
        margin: 10px 0 18px;
        justify-content: center;
    }

    .fp-viewer{
        width: 100%;
        height: 900px;
        border: 0;
        border-radius: 14px;
        box-shadow: 0 12px 30px rgba(0,0,0,.10);
        background: #fff;
    }
    @media (max-width: 768px){
        .fp-viewer{ height: 650px; }
    }
</style>

<section class="fp-wrap">
    <div class="container">

        @if($page->cover_image)
            <div class="fp-cover-a4">
                <img src="{{ asset('storage/'.$page->cover_image) }}" alt="{{ $page->title }}">
            </div>
        @endif
        @php
    $pdfUrl = $page->pdf_file
        ? asset('storage/'.$page->pdf_file).'?v='.($page->updated_at?->timestamp ?? time())
        : null;
@endphp

@if($page->pdf_file)
    <div class="fp-actions">
        <a class="thm-btn" href="{{ $pdfUrl }}" target="_blank" rel="noopener">
            View PDF
        </a>

        <a class="thm-btn" href="{{ route('front.financial-performance.pdf.download') }}">
            Download PDF
        </a>
    </div>

    <iframe class="fp-viewer" src="{{ $pdfUrl }}#toolbar=1&navpanes=0&scrollbar=1"></iframe>
@else
    <div class="alert alert-info">No PDF uploaded yet.</div>
@endif



    </div>
</section>

@include('includes.frontfooter')
@endsection
