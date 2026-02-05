@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    {{-- Breadcrumb/Header --}}
    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h1 class="fw-semibold mb-4 h6 text-primary-light">Edit Home Intro</h1>
            <div>
                <a href="{{ url('/user/dashboard') }}" class="text-secondary-light hover-text-primary hover-underline">
                    Dashboard
                </a>
                <span class="text-secondary-light">/ Edit Home Intro</span>
            </div>
        </div>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success mb-16">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('user.home-intro.update') }}" enctype="multipart/form-data" class="mt-24">
        @csrf
        @method('PUT')

        <div class="row gy-3">
            <div class="col-xl-12">
                <div class="shadow-1 radius-12 bg-base h-100 overflow-hidden">

                    <div class="card-header border-bottom bg-base py-16 px-24 d-flex align-items-center justify-content-between">
                        <h6 class="text-lg fw-semibold mb-0">Intro Content</h6>
                    </div>

                    <div class="card-body p-20">
                        <div class="row gy-3">

                            {{-- Tagline --}}
                            <div class="col-xl-6 col-sm-12">
                                <label for="tagline" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                    Tagline <span class="text-danger-600">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="tagline"
                                    name="tagline"
                                    value="{{ old('tagline', $intro->tagline) }}"
                                    class="form-control @error('tagline') is-invalid @enderror"
                                    placeholder="e.g. Welcome to"
                                >
                                @error('tagline')
                                    <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Title --}}
                            <div class="col-xl-6 col-sm-12">
                                <label for="title" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                    Title <span class="text-danger-600">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    value="{{ old('title', $intro->title) }}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="e.g. Local Authorities Pension Fund"
                                >
                                @error('title')
                                    <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Body --}}
                            <div class="col-12">
                                <label for="body" class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                    Body
                                </label>
                                <textarea
                                    id="body"
                                    name="body"
                                    rows="6"
                                    class="form-control @error('body') is-invalid @enderror"
                                    placeholder="Enter the intro paragraph shown on the homepage..."
                                >{{ old('body', $intro->body) }}</textarea>
                                @error('body')
                                    <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Image Upload --}}
                            <div class="col-xl-6 col-sm-12">
                                <label class="text-sm fw-semibold text-primary-light d-inline-block mb-8">
                                    Intro Image
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    accept="image/*"
                                >
                                @error('image')
                                    <div class="text-danger-600 text-sm mt-8">{{ $message }}</div>
                                @enderror

                                @if(!empty($intro->image))
                                    <div class="mt-16">
                                        <p class="text-sm text-secondary-light mb-8">Current Image:</p>
                                        <img
                                            src="{{ asset('storage/'.$intro->image) }}"
                                            alt="Intro Image"
                                            style="max-width: 320px; border-radius: 12px;"
                                        >
                                    </div>
                                @endif
                            </div>

                            {{-- Active Checkbox --}}
                            <div class="col-xl-6 col-sm-12 d-flex align-items-center">
                                <div class="form-check mt-24">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        name="is_active"
                                        value="1"
                                        id="is_active"
                                        {{ old('is_active', $intro->is_active) ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label text-sm fw-semibold text-primary-light" for="is_active">
                                        Active (Show on Homepage)
                                    </label>
                                </div>
                            </div>

                        </div> {{-- row --}}
                    </div> {{-- card-body --}}
                </div>
            </div>

            {{-- Buttons --}}
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-center gap-3 mt-8">

                    <button
                        type="reset"
                        class="border border-danger-600 bg-hover-danger-200 text-danger-600 text-md px-50 py-11 radius-8"
                    >
                        Reset
                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary-600 border border-primary-600 text-md px-28 py-12 radius-8"
                    >
                        Save Changes
                    </button>

                </div>
            </div>

        </div> {{-- row --}}
    </form>

</div>
@endsection
