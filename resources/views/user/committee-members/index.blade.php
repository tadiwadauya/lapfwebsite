@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Committee Members</h6>
            <p class="text-neutral-600 mt-4 mb-0">
                Dashboard / Governance / Committees / {{ $committee->name }} / Members
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('user.committees.index') }}" class="btn btn-primary-600 d-flex align-items-center gap-6">
                <i class="ri-arrow-left-line"></i> Back
            </a>

            <a href="{{ route('user.committees.members.create', $committee) }}"
               class="btn btn-primary-600 d-flex align-items-center gap-6">
                <i class="ri-add-large-line"></i> Add Member
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mb-16">{{ session('success') }}</div>
    @endif

    <div class="card h-100">
        <div class="card-body p-0">

            <div class="p-20 border-bottom border-neutral-200 d-flex align-items-center justify-content-between flex-wrap gap-12">
                <div class="text-secondary-light">
                    <strong class="text-primary-light">{{ $members->total() }}</strong> member(s)
                </div>
            </div>

            <div class="p-0">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th style="width: 70px;">#</th>
                            <th>Member</th>
                            <th style="width: 260px;">Nominated / Elected By</th>
                            <th style="width: 180px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $i => $member)
                            <tr>
                                <td>{{ $members->firstItem() + $i }}</td>

                                <td>
                                    <div>
                                        <div class="d-flex align-items-center flex-wrap gap-8">
                                            <h6 class="text-md mb-0 fw-medium text-secondary-light">
                                                {{ $member->member_name }}
                                            </h6>

                                            @if($member->is_chairperson)
                                                <span class="badge bg-primary-600 radius-8 px-12 py-6 text-sm">
                                                    Chairperson
                                                </span>
                                            @endif
                                        </div>

                                        @if(!empty($member->qualifications))
                                            <div class="text-sm text-secondary-light mt-4">
                                                {{ $member->qualifications }}
                                            </div>
                                        @endif
                                    </div>
                                </td>

                                <td>{{ $member->nominated_by ?? '—' }}</td>

                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('user.committees.members.edit', [$committee, $member]) }}"
                                           class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <form action="{{ route('user.committees.members.destroy', [$committee, $member]) }}"
                                              method="POST"
                                              onsubmit="return confirm('Delete this member?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center p-20">
                                    No members added yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="p-20">
                {{ $members->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
