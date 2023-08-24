@extends('admin.master')
@section('content')
    <div class="container">
        <form action="/profiles/{{ auth()->user()->id }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" required>
            </div>
            <div class="mb-3">
                <label for="password">New Password</label>
                <input type="text" class="form-control" name="password">
            </div>

            <button class="btn btn-primary" onclick="return confirm('Sure wanna update profile?')">Update Profiles!</button>
        </form>
    </div>
@endsection