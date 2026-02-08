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

<section style="padding:70px 0;">
    <div class="container">

        <div class="card p-4" style="border-radius:16px; box-shadow:0 12px 30px rgba(0,0,0,.07);">
            <p style="color:#6b7280; line-height:1.8;">
                {{ $page->intro }}
            </p>

            <hr>

            <h3 style="font-weight:900;">Contribution Rate</h3>
            <div class="table-responsive">
                <table class="table table-bordered" style="min-width:500px;">
                    <thead>
                        <tr>
                            <th>Contributor</th>
                            <th>Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Employer</td><td>{{ number_format($page->employer_rate, 1) }}%</td></tr>
                        <tr><td>Employee</td><td>{{ number_format($page->employee_rate, 1) }}%</td></tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ number_format($page->employer_rate + $page->employee_rate, 1) }}%</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <hr>

            <h3 style="font-weight:900;">Key Rules</h3>
            <ul style="color:#6b7280; line-height:1.9;">
                <li><strong>Eligibility:</strong> {{ $page->eligibility }}</li>
                <li><strong>Retirement Age:</strong> {{ $page->retirement_age }}</li>
                <li><strong>Early Retirement:</strong> {{ $page->early_retirement }}</li>
                <li><strong>Normal Retirement:</strong> {{ $page->normal_retirement }}</li>
                <li><strong>Late Retirement:</strong> {{ $page->late_retirement }}</li>
            </ul>

            <div style="margin-top:12px; color:#6b7280; line-height:1.8;">
                <strong>Ill-health Retirement:</strong><br>
                {!! nl2br(e($page->ill_health_retirement)) !!}
            </div>

            <hr>

            <h3 style="font-weight:900;">Pension Benefit</h3>
            <p style="color:#6b7280; line-height:1.8;">
                {{ $page->pension_benefit }}
            </p>

            <h4 style="font-weight:900; margin-top:18px;">Pre-retirement spouse’s pension</h4>
            <p style="color:#6b7280; line-height:1.8;">
                {{ $page->pre_retirement_spouse_pension }}
            </p>

            <hr>

            <h3 style="font-weight:900;">Children’s Pension</h3>

            <h5 style="font-weight:900;">If member leaves spouse</h5>
            <div class="table-responsive">
                <table class="table table-bordered" style="min-width:500px;">
                    <thead>
                        <tr><th>Children</th><th>Benefit</th></tr>
                    </thead>
                    <tbody>
                        @foreach(($page->children_with_spouse ?? []) as $row)
                            <tr>
                                <td>{{ $row['children'] ?? '' }}</td>
                                <td>{{ $row['benefit'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <h5 style="font-weight:900; margin-top:16px;">If member does not leave spouse</h5>
            <div class="table-responsive">
                <table class="table table-bordered" style="min-width:500px;">
                    <thead>
                        <tr><th>Children</th><th>Benefit</th></tr>
                    </thead>
                    <tbody>
                        @foreach(($page->children_without_spouse ?? []) as $row)
                            <tr>
                                <td>{{ $row['children'] ?? '' }}</td>
                                <td>{{ $row['benefit'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <hr>

            <h3 style="font-weight:900;">Death Benefit</h3>
            <p style="color:#6b7280; line-height:1.8;">{{ $page->death_benefit }}</p>

            <h4 style="font-weight:900; margin-top:18px;">Death After Retirement</h4>
            <p style="color:#6b7280; line-height:1.8;">{{ $page->death_after_retirement }}</p>

            <hr>

            <h3 style="font-weight:900;">Withdrawals</h3>
            <div class="table-responsive">
                <table class="table table-bordered" style="min-width:600px;">
                    <thead>
                        <tr><th>Years of Service</th><th>% Employer Portion + Interest</th></tr>
                    </thead>
                    <tbody>
                        @foreach(($page->withdrawal_scale ?? []) as $row)
                            <tr>
                                <td>{{ $row['years'] ?? '' }}</td>
                                <td>{{ $row['percent'] ?? '' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <p style="color:#6b7280; line-height:1.8;">
                {{ $page->withdrawals_note }}
            </p>

            <hr>

            <h3 style="font-weight:900;">Commutation Factors</h3>
            <p style="color:#6b7280; line-height:1.8;">{{ $page->commutation_factors }}</p>

            <h3 style="font-weight:900;">Contribution Rates</h3>
            <p style="color:#6b7280; line-height:1.8;">{{ $page->contribution_rates_note }}</p>

            <h3 style="font-weight:900;">Pension Increases</h3>
            <p style="color:#6b7280; line-height:1.8;">{{ $page->pension_increases }}</p>

            <h3 style="font-weight:900;">Voluntary Additional Contributions</h3>
            <p style="color:#6b7280; line-height:1.8;">{{ $page->voluntary_additional_contributions }}</p>
        </div>

    </div>
</section>

@include('includes.frontfooter')
@endsection
