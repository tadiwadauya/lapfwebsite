@extends('layouts.front')

@section('content')
@include('includes.frontnavbar')

<section class="team-six">
    <div class="container">
        <div class="team-six__top">
            <div class="team-six__left">
                <div class="section-title-three text-left">
                    <div class="section-title-three__tagline-box">
                        <p class="section-title-three__tagline">Team Member</p>
                    </div>
                    <h2 class="section-title-three__title">Our Awesome Creative<br> Team Member</h2>
                </div>
            </div>

            <div class="team-six__btn-box">
                {{-- You can change this to your Careers page if you have one --}}
                <a href="#" class="team-six__btn thm-btn">Join Our Team</a>
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

                        $img = !empty($member->photo)
                            ? asset('storage/'.$member->photo)
                            : asset('front/assets/images/team/team-6-1.jpg');
                    @endphp

                    <div class="col-xl-3 col-lg-6 col-md-6 wow {{ $wowClass }}" data-wow-delay="{{ $delay }}ms">
                        <div class="team-six__single">
                            <div class="team-six__img-box">
                                <div class="team-six__img">
                                    <img src="{{ $img }}" alt="{{ $member->full_name }}">

                                    <div class="team-six__social">
                                        @if($member->facebook)<a href="{{ $member->facebook }}" target="_blank"><span class="fab fa-facebook"></span></a>@endif
                                        @if($member->twitter)<a href="{{ $member->twitter }}" target="_blank"><span class="fab fa-twitter"></span></a>@endif
                                        @if($member->instagram)<a href="{{ $member->instagram }}" target="_blank"><span class="fab fa-instagram"></span></a>@endif
                                        @if($member->linkedin)<a href="{{ $member->linkedin }}" target="_blank"><span class="fab fa-linkedin"></span></a>@endif

                                        {{-- If no socials, show a clean placeholder icon --}}
                                        @if(!$member->facebook && !$member->twitter && !$member->instagram && !$member->linkedin)
                                            <a href="javascript:void(0)"><span class="icon-user"></span></a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="team-six__content">
                                <h3 class="team-six__title">
                                    <a href="javascript:void(0)">{{ $member->full_name }}</a>
                                </h3>
                                <p class="team-six__sub-title">{{ $member->position_title ?? '—' }}</p>

                                @if(!empty($member->qualifications))
                                    <p style="margin-top:10px; font-size:13px; line-height:1.5; color:#6b7280;">
                                        {{ \Illuminate\Support\Str::limit($member->qualifications, 140) }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info">
                            No team members have been added yet.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</section>

@include('includes.frontfooter')
@endsection
