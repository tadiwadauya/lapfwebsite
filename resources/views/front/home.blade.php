@extends('layouts.front')

@section('content')
@include('includes.frontnavbar')
@include('includes.slider')

{{-- =========================
   INTRO / WELCOME SECTION
   ========================= --}}
@if($intro && $intro->is_active)
<section class="why-choose-two">
    <div class="why-choose-two__shape-3 img-bounce">
        <img src="{{ asset('front/assets/images/shapes/why-choose-two-shape-3.png') }}" alt="">
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="why-choose-two__left">
                    <div class="section-title-three text-left">
                        <div class="section-title-three__tagline-box">
                            <p class="section-title-three__tagline">{{ $intro->tagline }}</p>
                        </div>
                        <h2 class="section-title-three__title">{{ $intro->title }}</h2>
                    </div>

                    {{-- Body MUST come from DB --}}
                    @if(!empty($intro->body))
                        <p class="why-choose-two__text">{{ $intro->body }}</p>
                    @endif
                </div>
            </div>

            <div class="col-xl-6">
                <div class="why-choose-two__right">
                    <div class="why-choose-two__img wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms">

                        {{-- Image from DB (no hard-coded fallback) --}}
                        @if(!empty($intro->image))
                            <img src="{{ asset('storage/'.$intro->image) }}" alt="">
                        @endif

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
@endif
<!--Why Choose Two End -->


{{-- =========================
   NEWS SECTION
   ========================= --}}
<section class="news-three" id="news">
    <div class="news-three__shape-1 img-bounce">
        <img src="{{ asset('front/assets/images/shapes/news-three-shape-1.png') }}" alt="">
    </div>
    <div class="news-three__shape-2 float-bob-y">
        <img src="{{ asset('front/assets/images/shapes/news-three-shape-2.png') }}" alt="">
    </div>

    <div class="container">
        <div class="section-title-three text-center">
            <div class="section-title-three__tagline-box">
                <p class="section-title-three__tagline">Notice Board / News</p>
            </div>
            <h2 class="section-title-three__title">Latest Updates.</h2>
        </div>

        <div class="row">
            @forelse($news as $post)
                <div class="col-xl-4 col-lg-4">
                    <div class="news-three__single">
                        <div class="news-three__img-box">
                            <div class="news-three__img">
                                {{-- Image from DB only --}}
                                @if(!empty($post->image))
                                    <img src="{{ asset('storage/'.$post->image) }}" alt="">
                                @endif
                            </div>

                            <div class="news-three__date">
                                <p>{{ ($post->published_at ?? $post->created_at)->format('d') }}</p>
                                <span>{{ ($post->published_at ?? $post->created_at)->format('M y') }}</span>
                            </div>
                        </div>

                        <div class="news-three__content">
                            <ul class="news-three__meta list-unstyled">
                                <li>
                                    <p><span class="icon-user"></span>{{ $post->author_name }}</p>
                                </li>
                                <li>
                                    <p><span class="icon-chat"></span>{{ $post->comments_count }} Comments</p>
                                </li>
                            </ul>

                            <h3 class="news-three__title">
                                <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>

                            {{-- Text from DB (excerpt preferred; fallback to body snippet) --}}
                            <p class="news-three__text">
                                @if(!empty($post->excerpt))
                                    {{ $post->excerpt }}
                                @else
                                    {{ \Illuminate\Support\Str::limit(strip_tags($post->body), 120) }}
                                @endif
                            </p>

                            <div class="news-three__btn">
                                <a href="{{ route('news.show', $post->slug) }}">
                                    Learn More<span class="icon-right-arrow1"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">No news posts available.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!--News Three End -->

@include('includes.frontfooter')
@endsection
