@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')

<div class="dashboard-main-body">

    <div class="breadcrumb d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <div>
            <h6 class="fw-semibold mb-0">Contact Messages</h6>
            <p class="text-neutral-600 mt-4 mb-0">Dashboard / Website / Messages</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-1 radius-12 bg-base">
        <div class="card-body p-24">

            <div class="table-responsive">
                <table class="table bordered-table mb-0">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Subject</th>
                            <th style="width: 140px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($messages as $m)
                            <tr>
                                <td>{{ optional($m->submitted_at)->format('d M Y H:i') }}</td>
                                <td>{{ $m->name }}</td>
                                <td>{{ $m->email }}</td>
                                <td>{{ $m->phone }}</td>
                                <td>{{ $m->subject }}</td>
                                <td class="d-flex gap-2">
                                    <a class="btn btn-sm btn-primary-600" href="{{ route('user.contact-messages.show', $m) }}">View</a>
                                    <form method="POST" action="{{ route('user.contact-messages.destroy', $m) }}"
                                          onsubmit="return confirm('Delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center">No messages yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-16">
                {{ $messages->links() }}
            </div>

        </div>
    </div>

</div>
@endsection
