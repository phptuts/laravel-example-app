@extends('layout')
@section('title', 'Register')
@section('content')
    <div class="row">
        <div class="col">
            <h1>Register</h1>
        </div>
    </div>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control  @error('email')is-invalid @enderror" id="email" name="email" placeholder="name@example.com">
        @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>
        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control  @error('password')is-invalid @enderror" id="password" name="password" placeholder="******">
        @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        </div>
        <button class="btn btn-success">Register</button>
    </form>

@endsection