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

<section class="news-three" style="padding-top:60px;">
    <div class="container">

        @if($page)
            <div class="section-title-three text-center">
                <div class="section-title-three__tagline-box">
                    <p class="section-title-three__tagline">{{ $page->title }}</p>
                </div>
            </div>

            @if($page->overview)
                <p style="max-width:900px; margin:0 auto 20px auto; text-align:center;">
                    {{ $page->overview }}
                </p>
            @endif

            @if(!empty($page->focus_areas))
                <div style="max-width:900px; margin:0 auto 40px auto;">
                    <h3 style="margin-bottom:10px;">Areas of special Trustees focus include:</h3>
                    <ul>
                        @foreach($page->focus_areas as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>

                    <p style="margin-top:18px;">
                        The Management Committee has sub-Committees for good Corporate Governance and the need for greater accountability and transparency.
                    </p>
                </div>
            @endif
        @endif

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
                                    <td>{{ $m->member_name }}</td>
                                    <td>{{ $m->qualifications }}</td>
                                    <td>{{ $m->nominated_by }}</td>
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
