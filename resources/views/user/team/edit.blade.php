@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Edit Team Member</h6>

<p class="text-neutral-600 mt-4 mb-0">
                Dashboard /  Team Member / Edit
            </p>
        </div>
        <a href="{{ route('user.team-members.index') }}"
           class="btn btn-primary-600 d-flex align-items-center gap-6">
            <i class="ri-arrow-left-line"></i> Back
        </a>
    </div>

    <div class="card shadow-1 radius-12 bg-base">
        <div class="card-body p-24">
            <form action="{{ route('user.team-members.update', $member) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @include('user.team.partials.form', ['member' => $member])

                <button class="btn btn-primary-600 px-28 py-12 radius-8">Update</button>
                <a href="{{ route('user.team-members.index') }}" class="btn btn-light">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
