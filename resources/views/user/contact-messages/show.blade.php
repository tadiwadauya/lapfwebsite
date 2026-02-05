@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Message Details</h6>
            <p class="text-neutral-600 mt-4 mb-0">Dashboard / Website / Messages / View</p>
        </div>
        <a href="{{ route('user.contact-messages.index') }}" class="btn btn-primary-600">Back</a>
    </div>

    <div class="card shadow-1 radius-12 bg-base">
        <div class="card-body p-24">
            <p><b>Date:</b> {{ optional($contactMessage->submitted_at)->format('d M Y H:i') }}</p>
            <p><b>Name:</b> {{ $contactMessage->name }}</p>
            <p><b>Email:</b> {{ $contactMessage->email }}</p>
            <p><b>Phone:</b> {{ $contactMessage->phone }}</p>
            <p><b>Subject:</b> {{ $contactMessage->subject }}</p>

            <hr>

            <p><b>Message:</b></p>
            <div class="p-16 radius-8 bg-neutral-100">
                {!! nl2br(e($contactMessage->message)) !!}
            </div>
        </div>
    </div>

</div>
@endsection
