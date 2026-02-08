@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Edit Committee Member</h6>
            <p class="text-neutral-600 mt-4 mb-0">
                Dashboard / Governance / {{ $committee->name }} / Members / Edit
            </p>
        </div>

        <a href="{{ route('user.committees.members.index', $committee) }}"
           class="btn btn-primary-600 d-flex align-items-center gap-6">
            <span class="d-flex text-md"><i class="ri-arrow-left-line"></i></span>
            Back to Members
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-16">{{ session('success') }}</div>
    @endif

    <div class="card shadow-1 radius-12 bg-base">
        <div class="card-body p-24">

            <form method="POST" action="{{ route('user.committees.members.update', [$committee, $member]) }}">
                @csrf
                @method('PUT')

                <div class="row gy-3">

                    {{-- Member Name --}}
                    <div class="col-xl-6 col-sm-12">
    <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
        Select Member <span class="text-danger-600">*</span>
    </label>

    <select name="person_id" class="form-control form-select @error('person_id') is-invalid @enderror">
        <option value="" disabled selected>Select a person...</option>
        @foreach($people as $person)
            <option value="{{ $person->id }}" {{ old('person_id') == $person->id ? 'selected' : '' }}>
                {{ $person->full_name }}
            </option>
        @endforeach
    </select>

    @error('person_id')
        <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
    @enderror
</div>

                    {{-- Nominated By --}}
                    <div class="col-xl-6 col-sm-12">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                            Nominated / Elected By
                        </label>
                        <input type="text"
                               name="nominated_by"
                               value="{{ old('nominated_by', $member->nominated_by) }}"
                               class="form-control @error('nominated_by') is-invalid @enderror"
                               placeholder="e.g. Group III Employers’ Representative">
                        @error('nominated_by')
                            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Qualifications --}}
                    <div class="col-12">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                            Qualifications
                        </label>
                        <textarea name="qualifications"
                                  rows="4"
                                  class="form-control @error('qualifications') is-invalid @enderror"
                                  placeholder="e.g. MBA, BSc Admin, IPMZ Diploma">{{ old('qualifications', $member->qualifications) }}</textarea>
                        @error('qualifications')
                            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Sort Order --}}
                    <div class="col-xl-4 col-sm-6">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                            Sort Order
                        </label>
                        <input type="number"
                               name="sort_order"
                               min="0"
                               value="{{ old('sort_order', $member->sort_order ?? 0) }}"
                               class="form-control @error('sort_order') is-invalid @enderror"
                               placeholder="0">
                        @error('sort_order')
                            <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                        @enderror
                        <small class="text-secondary-light d-block mt-8">
                            Lower number shows first (Chairperson is always shown first).
                        </small>
                    </div>

                    {{-- Chairperson --}}
                    <div class="col-xl-4 col-sm-6 d-flex align-items-center">
                        <div class="form-check mt-24">
                            <input class="form-check-input"
                                   type="checkbox"
                                   name="is_chairperson"
                                   value="1"
                                   id="is_chairperson"
                                   {{ old('is_chairperson', $member->is_chairperson) ? 'checked' : '' }}>
                            <label class="form-check-label text-sm fw-semibold text-primary-light" for="is_chairperson">
                                Chairperson
                            </label>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-end gap-3 mt-8">
                            <a href="{{ route('user.committees.members.index', $committee) }}"
                               class="border border-neutral-300 bg-hover-neutral-200 text-secondary-light text-md px-28 py-12 radius-8">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8">
                                Save Changes
                            </button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>
@endsection
