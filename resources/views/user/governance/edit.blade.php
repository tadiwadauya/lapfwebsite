@extends('layouts.admin')
@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Governance Overview</h6>
            <p class="text-neutral-600 mt-4 mb-0">Dashboard / Governance / Overview</p>
        </div>

        <a href="{{ route('governance') }}" target="_blank" class="btn btn-primary-600 d-flex align-items-center gap-6">
            View Front Page
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-1 radius-12 bg-base">
        <div class="card-body p-24">

            <form method="POST" action="{{ route('user.governance.update') }}">
                @csrf
                @method('PUT')

                <div class="row gy-3">

                    <div class="col-12">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Title</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $page->title) }}">
                        @error('title') <div class="text-danger-600 text-sm mt-8">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Overview Paragraph</label>
                        <textarea name="overview" rows="4" class="form-control">{{ old('overview', $page->overview) }}</textarea>
                        @error('overview') <div class="text-danger-600 text-sm mt-8">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-12">
                        <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">Focus Areas (one per line)</label>

                        @php
                            $focus = old('focus_areas', $page->focus_areas ?? []);
                            if (count($focus) < 6) {
                                $focus = array_pad($focus, 6, '');
                            }
                        @endphp

                        <div class="row gy-2">
                            @foreach($focus as $i => $val)
                                <div class="col-xl-6">
                                    <input type="text" name="focus_areas[]" class="form-control" value="{{ $val }}" placeholder="e.g. Investment performance">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-check mt-10">
                            <input class="form-check-input" type="checkbox" name="is_active" value="1" id="is_active"
                                {{ old('is_active', $page->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label text-sm fw-semibold text-primary-light" for="is_active">
                                Active
                            </label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="d-flex justify-content-end mt-10">
                            <button class="btn btn-primary-600">Save Changes</button>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>

</div>
@endsection
