@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div class="">
            <h6 class="fw-semibold mb-0">Dashboard</h6>
            <p class="text-neutral-600 mt-4 mb-0">School -> Manage your school, track attendance, expense, and net worth.</p>
        </div>
    </div>

    <div class="mt-24">
        <div class="row gy-4">
            <div class="col-xxl-12">
                <div class="row gy-4">

                    {{-- ABOUT US / INTRO (Home Intro Section) --}}
                    <div class="col-xxl-4 col-sm-6">
                        <div class="card shadow-1 radius-8 gradient-bg-end-1 h-100">
                            <div class="card-body p-20">
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                    <div class="w-44-px h-44-px bg-warning-600 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('admin/assets/images/icons/dashboard-icon1.png') }}" alt="Icon">
                                    </div>
                                    <p class="fw-medium text-primary-light mb-1">About Us (Home Intro)</p>
                                </div>

                                <div class="d-flex gap-2">
                                <a href="{{ route('user.home-intro.edit') }}" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                                    Admin View
                                </a>

                                    <a href="{{ route('home') }}" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" target="_blank">
                                        Front View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- NEWS / NOTICE BOARD --}}
                    <div class="col-xxl-4 col-sm-6">
                        <div class="card shadow-1 radius-8 gradient-bg-end-2 h-100">
                            <div class="card-body p-20">
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                    <div class="w-44-px h-44-px bg-blue-600 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('admin/assets/images/icons/dashboard-icon2.png') }}" alt="Icon">
                                    </div>
                                    <p class="fw-medium text-primary-light mb-1">Notice Board / News</p>
                                </div>

                                <div class="d-flex gap-2">
                                <a href="#" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                                    Admin View
                                </a>

                                    <a href="{{ route('home') }}#news" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" target="_blank">
                                        Front View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- SERVICES (placeholder until CRUD is built) --}}
                    <div class="col-xxl-4 col-sm-6">
                        <div class="card shadow-1 radius-8 gradient-bg-end-3 h-100">
                            <div class="card-body p-20">
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                    <div class="w-44-px h-44-px bg-purple-600 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('admin/assets/images/icons/dashboard-icon3.png') }}" alt="Icon">
                                    </div>
                                    <p class="fw-medium text-primary-light mb-1">Services</p>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="#" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                                        Admin View
                                    </a>

                                    <a href="{{ route('home') }}" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" target="_blank">
                                        Front View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- PORTFOLIO (placeholder) --}}
                    <div class="col-xxl-4 col-sm-6">
                        <div class="card shadow-1 radius-8 gradient-bg-end-4 h-100">
                            <div class="card-body p-20">
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                    <div class="w-44-px h-44-px bg-primary-600 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('admin/assets/images/icons/dashboard-icon4.png') }}" alt="Icon">
                                    </div>
                                    <p class="fw-medium text-primary-light mb-1">Portfolio</p>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="#" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                                        Admin View
                                    </a>

                                    <a href="{{ route('home') }}" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" target="_blank">
                                        Front View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- CONTACT US (placeholder) --}}
                    <div class="col-xxl-4 col-sm-6">
                        <div class="card shadow-1 radius-8 gradient-bg-end-5 h-100">
                            <div class="card-body p-20">
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                    <div class="w-44-px h-44-px bg-success-600 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('admin/assets/images/icons/dashboard-icon5.png') }}" alt="Icon">
                                    </div>
                                    <p class="fw-medium text-primary-light mb-1">Contact Us</p>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="#" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                                        Admin View
                                    </a>

                                    <a href="{{ route('home') }}" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" target="_blank">
                                        Front View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- OUR TEAM (placeholder) --}}
                    <div class="col-xxl-4 col-sm-6">
                        <div class="card shadow-1 radius-8 gradient-bg-end-6 h-100">
                            <div class="card-body p-20">
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                    <div class="w-44-px h-44-px bg-cyan-600 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('admin/assets/images/icons/dashboard-icon6.png') }}" alt="Icon">
                                    </div>
                                    <p class="fw-medium text-primary-light mb-1">Our Team</p>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="#" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                                        Admin View
                                    </a>

                                    <a href="{{ route('home') }}" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" target="_blank">
                                        Front View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- TESTIMONIALS (you had a card for it; keeping it with placeholder links) --}}
                    <div class="col-xxl-4 col-sm-6">
                        <div class="card shadow-1 radius-8 gradient-bg-end-6 h-100">
                            <div class="card-body p-20">
                                <div class="d-flex flex-wrap align-items-center gap-3 mb-16">
                                    <div class="w-44-px h-44-px bg-cyan-600 rounded-circle d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('admin/assets/images/icons/dashboard-icon6.png') }}" alt="Icon">
                                    </div>
                                    <p class="fw-medium text-primary-light mb-1">Testimonials</p>
                                </div>

                                <div class="d-flex gap-2">
                                    <a href="#" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6">
                                        Admin View
                                    </a>

                                    <a href="{{ route('home') }}" class="my-sidebar-btn btn btn-primary-600 d-flex align-items-center gap-6" target="_blank">
                                        Front View
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> {{-- row gy-4 --}}
            </div>
        </div>
    </div>
    <a href="{{ route('user.governance.edit') }}" class="btn btn-primary-600">Admin View</a>
<a href="{{ route('governance') }}" class="btn btn-primary-600" target="_blank">Front View</a>

    @include('includes.footernavbar')
</div>
@endsection
