@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <h3 class="mb-3">Upload Pensioner Images</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.pensioners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Title (optional)</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Starting Display Order</label>
                        <input type="number" name="display_order" class="form-control" value="{{ old('display_order', 0) }}">
                    </div>

                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_active" id="is_active" checked>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Select Images (multiple)</label>
                        <input type="file" name="images[]" class="form-control" multiple required>
                    </div>
                </div>

                <hr class="my-4">

                <button class="btn btn-primary">Upload</button>
                <a href="{{ route('user.pensioners.index') }}" class="btn btn-light">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
