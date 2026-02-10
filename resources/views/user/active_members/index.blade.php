@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Active Members </h3>
        <a href="{{ route('user.active-members.create') }}" class="btn btn-primary">Upload Images</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th style="width:110px;">Image</th>
                        <th>Title</th>
                        <th style="width:110px;">Order</th>
                        <th style="width:110px;">Active</th>
                        <th style="width:200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($images as $img)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$img->image) }}"
                                     style="width:90px;height:70px;object-fit:cover;border-radius:10px;">
                            </td>
                            <td>{{ $img->title ?? '—' }}</td>
                            <td>{{ $img->display_order }}</td>
                            <td>
                                {!! $img->is_active
                                    ? '<span class="badge bg-success">Yes</span>'
                                    : '<span class="badge bg-secondary">No</span>' !!}
                            </td>
                            <td>
                                <a href="{{ route('user.active-members.edit', $img->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('user.active-members.destroy', $img->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this image?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No images uploaded yet.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $images->links() }}
        </div>
    </div>
</div>
@endsection
