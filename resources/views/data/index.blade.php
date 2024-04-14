@extends('layout')

@section('content')
<div class="row">
    <div class="col">
        <h1>Secret Data</h1>
        <p>Your email {{ auth()->user()->email }}</p>
    </div>
</div>
@endsection