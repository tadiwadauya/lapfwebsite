@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <h3 class="mb-3">Edit Image</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.active-members.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title (optional)</label>
                        <input type="text" name="title" class="form-control"
                               value="{{ old('title', $image->title) }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Display Order</label>
                        <input type="number" name="display_order" class="form-control"
                               value="{{ old('display_order', $image->display_order) }}">
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                   {{ old('is_active', $image->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Replace Image (optional)</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-12 mt-2">
                        <img src="{{ asset('storage/'.$image->image) }}"
                             style="max-width:100%; border-radius:14px; box-shadow:0 12px 30px rgba(0,0,0,.12);">
                    </div>
                </div>

                <hr class="my-4">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('user.active-members.index') }}" class="btn btn-light">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
