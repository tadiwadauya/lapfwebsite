@extends('layouts.admin')
@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <h3 class="mb-3">Financial Performance</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.financial-performance.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Page Title</label>
                    <input type="text" name="title" class="form-control"
                           value="{{ old('title', $page->title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cover Image (Top Photo)</label>
                    <input type="file" name="cover_image" class="form-control">

                    @if($page->cover_image)
                        <div class="mt-3">
                            <img src="{{ asset('storage/'.$page->cover_image) }}"
                                 style="max-width:100%; border-radius:14px; box-shadow:0 12px 30px rgba(0,0,0,.12);">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">PDF File</label>
                    <input type="file" name="pdf_file" class="form-control" accept="application/pdf">

                    @if($page->pdf_file)
                        <div class="mt-2">
                            <a class="btn btn-sm btn-outline-primary"
                               href="{{ asset('storage/'.$page->pdf_file) }}" target="_blank">
                                View Current PDF
                            </a>
                            <a class="btn btn-sm btn-outline-success"
                               href="{{ asset('storage/'.$page->pdf_file) }}" download>
                                Download Current PDF
                            </a>
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
