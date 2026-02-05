@extends('layouts.admin')
@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Committees</h6>
            <p class="text-neutral-600 mt-4 mb-0">Dashboard / Governance / Committees</p>
        </div>

        <a href="{{ route('user.committees.create') }}" class="btn btn-primary-600 d-flex align-items-center gap-6">
            <i class="ri-add-large-line"></i> Add Committee
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card h-100">
        <div class="card-body p-0">
            <div class="p-0">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Order</th>
                            <th>Active</th>
                            <th style="width:260px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($committees as $c)
                            <tr>
                                <td class="text-primary-light fw-semibold">{{ $c->name }}</td>
                                <td>{{ $c->sort_order }}</td>
                                <td>{{ $c->is_active ? 'Yes' : 'No' }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('user.committees.members.index', $c) }}" class="btn btn-sm btn-primary-600">
                                        Members
                                    </a>
                                    <a href="{{ route('user.committees.edit', $c) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form method="POST" action="{{ route('user.committees.destroy', $c) }}"
                                          onsubmit="return confirm('Delete this committee?')" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-20">
                    {{ $committees->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
