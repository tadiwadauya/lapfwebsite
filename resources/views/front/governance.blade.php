@extends('layouts.front')
@section('content')
@include('includes.frontnavbar')



<section class="page-header">
    <div class="page-header__bg" style="background-image: url({{ asset('front/assets/images/backgrounds/page-header-bg.jpg') }});"></div>
    <div class="container">
        <div class="page-header__inner">
            <h2>Governance</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><span class="icon-down-arrow"></span></li>
                <li>Governance</li>
            </ul>
        </div>
    </div>
</section>
<br>
<br>
<section class="services-four">
            <div class="container">
                <div class="services-four__top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="services-four__left">
                                <div class="section-title-three text-left">
                                @if(!empty($page))
                                    <div class="section-title-three__tagline-box">
                                        <p class="section-title-three__tagline">Governance</p>
                                    </div>
                                
                                    <h2 class="section-title-two__title">{{ $page->title }}</h2>
                                </div>  
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="services-four__right">
                            @if(!empty($page->overview))
                                <p class="services-four__text">{{ $page->overview }}</p>
                                @endif
                                @endif
                            </div>
                          
                        </div>
                    </div>
                </div>
               
                            <!--tab-->
                            <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-two__left">
                        @if(!empty($page->focus_areas) && is_iterable($page->focus_areas))
                            <h3 class="about-three__title">Areas of special Trustees focus include:</h3>
                            <p class="about-two__text">
                            <ul>
                        @foreach($page->focus_areas as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                    @endif
                           
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-two__right">
                            <div class="about-two__img wow slideInRight" data-wow-delay="100ms"
                                data-wow-duration="2500ms">
                                <div class="about-two__shape-1 img-bounce">
                                    <img src="{{ asset('front/assets/images/shapes/about-two-shape-1.pg') }}" alt="">
                                </div>
                                <img src="{{ asset('front/assets/images/resources/about-two-img-1.png') }}" alt="">
                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="about-two__btn-box">
                            <p class="about-two__text"> The Management Committee has sub-Committees for good Corporate Governance and the need for greater accountability and transparency. These are Audit & Risk Management, Finance & Investments and Human Resources & General Purpose</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </section>

<section class="news-three" style="padding-top:60px;">
    <div class="container">


    {{-- ===== Trustees / Members Circle (FIX: TRUE CENTER + NO DUPLICATE PERSON) ===== --}}
    {{-- ===== Page Content ===== --}}
       

<style>
/* Square wrapper + grid centering guarantees true center */
.governance-circle-wrapper{
    position: relative !important;
    width: min(920px, 100%);
    aspect-ratio: 1 / 1;
    margin: 40px auto 60px auto;

    display: grid;
    place-items: center;

    /* spacing between center and ring */
    --radius: 320px;
}

@media (max-width: 991px){ .governance-circle-wrapper{ --radius: 255px; } }
@media (max-width: 575px){ .governance-circle-wrapper{ --radius: 195px; } }

.circle{
    position: absolute;
    inset: 0;
    pointer-events: none; /* optional */
}

/* CENTER */
.center-person{
    width: 280px;
    text-align: center;
    z-index: 20;
    pointer-events: auto;
}

.center-person .avatar{
    width: 240px;
    height: 240px;
    border-radius: 50%;
    object-fit: cover;
    border: 6px solid #0d6efd;
    background: #fff;
    box-shadow: 0 14px 35px rgba(0,0,0,.14);
}

.center-person h6{
    margin-top: 12px;
    font-weight: 900;
    font-size: 16px;
}

.center-person .qual{
    margin-top: 4px;
    font-size: 13px;
    color: #6b7280;
    line-height: 1.35;
}

.center-person .badge{
    display: inline-block;
    margin-top: 8px;
    padding: 6px 14px;
    border-radius: 999px;
    background: #0d6efd;
    color: #fff;
    font-size: 12px;
    font-weight: 800;
}

/* OUTER */
.circle-item{
    position: absolute;
    top: 50%;
    left: 50%;
    width: 260px;
    text-align: center;
    pointer-events: auto;

    /* rotate around center then counter-rotate */
    transform:
        translate(-50%, -50%)
        rotate(calc(360deg / var(--total) * var(--i)))
        translate(var(--radius))
        rotate(calc(-360deg / var(--total) * var(--i)));
}

/* Make 5 outer people same visibility as center (slightly smaller) */
.circle-item img{
    width: 210px;
    height: 210px;
    border-radius: 50%;
    object-fit: cover;
    border: 5px solid #e5e7eb;
    background: #fff;
    box-shadow: 0 12px 30px rgba(0,0,0,.10);
}

.circle-item .name{
    margin-top: 10px;
    font-weight: 900;
    font-size: 15px;
    line-height: 1.2;
}

.circle-item .qual{
    font-size: 13px;
    color: #6b7280;
    line-height: 1.3;
    margin-top: 4px;
}

.pill{
    display: inline-block;
    margin-top: 8px;
    padding: 4px 10px;
    border-radius: 999px;
    background: #0d6efd;
    color: #fff;
    font-size: 11px;
    font-weight: 800;
}
</style>

@php
    $peopleCollection = collect($people ?? [])->values();

    // Pick who goes in the center
    $center = $peopleCollection->firstWhere('is_chairperson', 1) ?? $peopleCollection->first();

    // IMPORTANT: remove center from others (fallback to name match if id is missing)
    $others = $peopleCollection->filter(function ($p) use ($center) {
        if (!$center) return true;

        // If both have IDs, compare IDs
        if (!empty($p->id) && !empty($center->id)) {
            return (int)$p->id !== (int)$center->id;
        }

        // Fallback: compare names (case-insensitive, trimmed)
        $pName = strtolower(trim($p->full_name ?? ''));
        $cName = strtolower(trim($center->full_name ?? ''));
        return $pName !== $cName;
    })->values();

    // With 6 people total => 1 center + 5 around
@endphp

@if($center)
    <div class="governance-circle-wrapper">
        

        {{-- Center person (ALWAYS exact center) --}}
        <div class="center-person">
            @if(!empty($center->photo))
                <img class="avatar" src="{{ asset('storage/'.$center->photo) }}" alt="{{ $center->full_name }}">
            @else
                <img class="avatar" src="{{ asset('front/assets/images/resources/team-1-1.jpg') }}" alt="{{ $center->full_name }}">
            @endif

            <h6 class="mb-0">{{ $center->full_name }}</h6>

            @if(!empty($center->default_qualifications))
                <div class="qual">{{ $center->default_qualifications }}</div>
            @endif

            @if(!empty($center->is_chairperson))
                <span class="badge">Chairperson</span>
            @endif
        </div>

        {{-- Outer members --}}
        <div class="circle">
            @foreach($others as $index => $person)
                <div class="circle-item" style="--i: {{ $index }}; --total: {{ max(1, $others->count()) }};">
                    @if(!empty($person->photo))
                        <img src="{{ asset('storage/'.$person->photo) }}" alt="{{ $person->full_name }}">
                    @else
                        <img src="{{ asset('front/assets/images/resources/team-1-1.jpg') }}" alt="{{ $person->full_name }}">
                    @endif

                    <div class="name">{{ $person->full_name }}</div>

                    @if(!empty($person->default_qualifications))
                        <div class="qual">{{ $person->default_qualifications }}</div>
                    @endif

                    @if(!empty($person->is_chairperson))
                        <div><span class="pill">Chairperson</span></div>
                    @endif
                </div>
            @endforeach
        </div>

    </div>
@endif


        {{-- ===== Committees Tables ===== --}}
        @foreach($committees as $committee)
            <div style="margin-bottom:50px;">
                <h3 style="margin-bottom:12px;">{{ $committee->name }}</h3>

                <div style="overflow:auto;">
                    <table class="table table-bordered" style="min-width:700px;">
                        <thead>
                            <tr>
                                <th>Member</th>
                                <th>Qualifications</th>
                                <th>Nominated / Elected By</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($committee->members as $m)
                                <tr>
                                    <td>
                                        {{ $m->member_name }}
                                        @if(!empty($m->is_chairperson))
                                            <span class="badge bg-primary" style="margin-left:8px;">Chairperson</span>
                                        @endif
                                    </td>
                                    <td>{{ $m->qualifications ?? '—' }}</td>
                                    <td>{{ $m->nominated_by ?? '—' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No members added yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach

    </div>
</section>

@include('includes.frontfooter')
@endsection
