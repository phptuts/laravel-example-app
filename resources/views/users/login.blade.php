@extends('layout')
@section('title', 'Login')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Login</h1>
        </div>
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" required class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" required class="form-control" id="password" name="password" placeholder="******">
        </div>
        <button class="btn btn-success">Login</button>
        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error')}}
            </div>
        @endif
    </form>
@endsection