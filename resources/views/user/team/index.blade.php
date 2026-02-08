@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Team Member</h6>
            <p class="text-neutral-600 mt-4 mb-0">
                Dashboard / Team
            </p>
        </div>

        <a href="{{ route('user.team-members.create') }}"
           class="btn btn-primary-600 d-flex align-items-center gap-6">
            <i class="ri-add-large-line"></i> Add Person
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-16">{{ session('success') }}</div>
    @endif

    <div class="card h-100">
        <div class="card-body p-0">

            <table class="table bordered-table mb-0">
                <thead>
                    <tr>
                        <th style="width:90px;">Photo</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th style="width:120px;">Order</th>
                        <th style="width:120px;">Active</th>
                        <th style="width:170px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($members as $m)
                        <tr>
                            <td>
                                <img
                                    src="{{ $m->photo ? asset('storage/'.$m->photo) : asset('front/assets/images/team/team-6-1.jpg') }}"
                                    style="width:70px;height:70px;object-fit:cover;border-radius:10px;"
                                    alt="{{ $m->full_name }}"
                                >
                            </td>
                            <td class="fw-bold">{{ $m->full_name }}</td>
                            <td>{{ $m->position_title ?? '—' }}</td>
                            <td>{{ $m->display_order }}</td>
                            <td>
                                @if($m->is_active)
                                    <span class="badge bg-success">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user.team-members.edit', $m) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('user.team-members.destroy', $m) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Delete this team member?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6">No team members found.</td></tr>
                    @endforelse
                </tbody>
            </table>

            {{ $members->links() }}
        </div>
    </div>
</div>
@endsection
