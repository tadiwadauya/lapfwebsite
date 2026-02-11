@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <h3 class="mb-3">Complaints Handling Procedure</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.complaints-procedure.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Page Title</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ old('title', $page->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload Image (one)</label>
                    <input type="file" name="image" class="form-control">
                    <small class="text-muted">Upload a new image to replace the current one.</small>

                    @if($page->image)
                        <div class="mt-3">
                            <img src="{{ asset('storage/'.$page->image) }}"
                                 style="max-width:100%; border-radius:14px; box-shadow:0 12px 30px rgba(0,0,0,.12);">
                        </div>
                    @endif
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_active"
                           {{ $page->is_active ? 'checked' : '' }}>
                    <label class="form-check-label">Active</label>
                </div>

                <button class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
