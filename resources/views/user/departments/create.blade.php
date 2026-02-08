@extends('layouts.admin')
@section('content')
@include('includes.adminnavbar')
@include('includes.adminsidebar')
<div class="container">
    <h3 class="mb-3">Add Department</h3>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('user.departments.store') }}" method="POST">
                @csrf
                @include('user.departments.partials.form', ['department' => null])

                <button class="btn btn-primary">Save</button>
                <a href="{{ route('user.departments.index') }}" class="btn btn-light">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection
