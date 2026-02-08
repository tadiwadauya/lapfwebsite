@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">People Directory</h6>
            <p class="text-neutral-600 mt-4 mb-0">
                Dashboard / Governance / People
            </p>
        </div>

        <a href="{{ route('user.people.create') }}"
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
                        <th style="width: 80px;">#</th>
                        <th>Person</th>
                        <th>Status</th>
                        <th style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($people as $i => $person)
                    <tr>
                        <td>{{ $people->firstItem() + $i }}</td>

                        <td>
                            <div class="d-flex align-items-center gap-12">
                                @if($person->photo)
                                    <img src="{{ asset('storage/'.$person->photo) }}"
                                         class="rounded-circle"
                                         style="width:50px;height:50px;object-fit:cover;">
                                @else
                                    <div class="rounded-circle bg-neutral-200 d-flex align-items-center justify-content-center"
                                         style="width:50px;height:50px;">
                                        <i class="ri-user-line"></i>
                                    </div>
                                @endif

                                <div>
                                    <h6 class="mb-2">{{ $person->full_name }}</h6>
                                    @if($person->default_qualifications)
                                        <div class="text-sm text-secondary-light">
                                            {{ $person->default_qualifications }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <td>
                            @if($person->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('user.people.edit', $person) }}"
                                   class="btn btn-sm btn-warning">Edit</a>

                                <form method="POST"
                                      action="{{ route('user.people.destroy', $person) }}"
                                      onsubmit="return confirm('Delete this person?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-24">
                            No people added yet.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="p-20">
                {{ $people->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
