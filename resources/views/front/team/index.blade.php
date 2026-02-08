@extends('layouts.front')

@section('content')
@include('includes.frontnavbar')
<section class="page-header page-header--small">
    <div class="page-header__bg"
         style="background-image: url({{ asset('front/assets/images/backgrounds/page-header-bg.jpg') }});">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Leadership</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li>Leadership</li>
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
<section class="team-six">
    <div class="container">
        <div class="team-six__top">
            <div class="team-six__left">
                <div class="section-title-three text-left">
                    <div class="section-title-three__tagline-box">
                        <p class="section-title-three__tagline">Leadership</p>
                    </div>
                    <h2 class="section-title-three__title">Our Leadership</h2>
                </div>
            </div>

        </div>

        <div class="team-six__bottom">
            <div class="row">
                @forelse($team as $i => $member)
                    @php
                        $wowClass = match($i % 4) {
                            0 => 'fadeInLeft',
                            1 => 'fadeInUp',
                            2 => 'fadeInDown',
                            default => 'fadeInRight',
                        };

                        $delay = (($i % 4) + 1) * 100;

                        $img = $member->photo
                            ? asset('storage/'.$member->photo)
                            : asset('front/assets/images/team/team-6-1.jpg');
                    @endphp

                    <div class="col-xl-3 col-lg-6 col-md-6 wow {{ $wowClass }}" data-wow-delay="{{ $delay }}ms">
                        <div class="team-six__single">
                            <div class="team-six__img-box">
                                <div class="team-six__img">
                                    <img src="{{ $img }}" alt="{{ $member->full_name }}">
                                </div>
                            </div>
                            <div class="team-six__content">
                                <h3 class="team-six__title">
                                    <a href="javascript:void(0)">{{ $member->full_name }}</a>
                                </h3>
                                <p class="team-six__sub-title">{{ $member->position_title ?? '—' }}</p>

                                @if(!empty($member->qualifications))
                                    <p style="margin-top:10px; font-size:13px; line-height:1.5; color:#6b7280;">
                                        {{ \Illuminate\Support\Str::limit($member->qualifications, 300) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            No team members available yet.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</section>

@include('includes.frontfooter')
@endsection
