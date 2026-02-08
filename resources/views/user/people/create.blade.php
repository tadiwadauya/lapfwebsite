@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Add Person</h6>
            <p class="text-neutral-600 mt-4 mb-0">
                Dashboard / Governance / People / Create
            </p>
        </div>

        <a href="{{ route('user.people.index') }}"
           class="btn btn-primary-600 d-flex align-items-center gap-6">
            <i class="ri-arrow-left-line"></i> Back
        </a>
    </div>

    <div class="card shadow-1 radius-12 bg-base">
        <div class="card-body p-24">

            <form method="POST"
                  action="{{ route('user.people.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="row gy-3">

                    <div class="col-xl-6">
                        <label class="text-sm fw-semibold mb-8">Full Name *</label>
                        <input type="text"
                               name="full_name"
                               value="{{ old('full_name') }}"
                               class="form-control @error('full_name') is-invalid @enderror">
                        @error('full_name') <div class="text-danger-600 mt-8">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-xl-6">
                        <label class="text-sm fw-semibold mb-8">Sort Order</label>
                        <input type="number"
                               name="sort_order"
                               value="{{ old('sort_order', 0) }}"
                               class="form-control">
                    </div>

                    <div class="col-12">
                        <label class="text-sm fw-semibold mb-8">Qualifications</label>
                        <textarea name="default_qualifications"
                                  rows="3"
                                  class="form-control">{{ old('default_qualifications') }}</textarea>
                    </div>

                    <div class="col-xl-6">
                        <label class="text-sm fw-semibold mb-8">Photo</label>
                        <input type="file"
                               name="photo"
                               class="form-control"
                               accept="image/*">
                    </div>

                    <div class="col-xl-6 d-flex align-items-center">
                        <div class="form-check mt-24">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="is_active"
                                   value="1"
                                   checked>
                            <label class="form-check-label fw-semibold">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-end gap-3 mt-16">
                            <a href="{{ route('user.people.index') }}"
                               class="border border-danger-600 bg-hover-danger-200 text-danger-600 px-28 py-12 radius-8">
                                Cancel
                            </a>
                            <button class="btn btn-primary-600 px-28 py-12 radius-8">
                                Save Person
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>
@endsection
