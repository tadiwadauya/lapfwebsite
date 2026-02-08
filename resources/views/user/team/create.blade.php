@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Add Team Member</h6>
            <p class="text-neutral-600 mt-4 mb-0">
                Dashboard / Governance / People / Create
            </p>
</div>
<a href="{{ route('user.team-members.index') }}"
           class="btn btn-primary-600 d-flex align-items-center gap-6">
            <i class="ri-arrow-left-line"></i> Back
        </a>

        <div class="col-12">
        <div class="d-flex justify-content-end gap-3 mt-16">
            <form action="{{ route('user.team-members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @include('user.team.partials.form', ['member' => null])

                <button class="btn btn-primary-600 px-28 py-12 radius-8">Save</button>
                <a href="{{ route('user.team-members.index') }}" class="btn btn-light">Back</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
