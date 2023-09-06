@extends('master')
@section('body')
<div class="form-login" style="
    margin-left: auto;
    margin-right: auto;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 25%;
    height: 25%;
    ">
    <form method="POST" action="{{ route('login.post') }}">
        <div class="form-group">
            @csrf
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" name="email">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="password">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection