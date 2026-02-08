@extends('layouts.admin')

@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <h3 class="mb-3">Edit Department</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.departments.update', $department) }}" method="POST">
                @csrf
                @method('PUT')

                @include('user.departments.partials.form', ['department' => $department])

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('user.departments.index') }}" class="btn btn-light">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
