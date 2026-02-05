@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Add Committee</h6>
            <p class="text-neutral-600 mt-4 mb-0">Dashboard / Governance / Committees / Create</p>
        </div>

        <a href="{{ route('user.committees.index') }}" class="btn btn-primary-600 d-flex align-items-center gap-6">
            <i class="ri-arrow-left-line"></i> Back
        </a>
    </div>

    <div class="card shadow-1 radius-12 bg-base">
        <div class="card-body p-24">

            <form method="POST" action="{{ route('user.committees.store') }}">
                @csrf

                <div class="row gy-3">

                    <div class="col-xl-8 col-sm-12">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                            Committee Name <span class="text-danger-600">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               value="{{ old('name') }}"
                               class="form-control @error('name') is-invalid @enderror"
                               placeholder="e.g. AUDIT AND RISK MANAGEMENT COMMITTEE">
                        @error('name')
                            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-2 col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                            Sort Order
                        </label>
                        <input type="number"
                               name="sort_order"
                               min="0"
                               value="{{ old('sort_order', 0) }}"
                               class="form-control @error('sort_order') is-invalid @enderror">
                        @error('sort_order')
                            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-xl-2 col-sm-6 d-flex align-items-center">
                        <div class="form-check mt-24">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="is_active"
                                   value="1"
                                   id="is_active"
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label text-sm fw-semibold text-primary-light" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-end gap-10 mt-10">
                            <a href="{{ route('user.committees.index') }}"
                               class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-28 py-12 radius-8">
                                Cancel
                            </a>
                            <button class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8">
                                Save Committee
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>
@endsection
