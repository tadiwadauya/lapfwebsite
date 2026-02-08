@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Departments</h3>
        <a href="{{ route('user.departments.create') }}" class="btn btn-primary">Add Department</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th style="width:120px;">Order</th>
                        <th style="width:120px;">Active</th>
                        <th style="width:170px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($departments as $d)
                        <tr>
                            <td class="fw-bold">{{ $d->name }}</td>
                            <td>{{ $d->slug }}</td>
                            <td>{{ $d->display_order }}</td>
                            <td>
                                @if($d->is_active)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user.departments.edit', $d) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('user.departments.destroy', $d) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this department?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5">No departments added yet.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $departments->links() }}
        </div>
    </div>
</div>
@endsection
