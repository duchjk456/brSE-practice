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
    <form>
        <div class="form-group" method="POST" action="{{ route('admin.post') ">
            @csrf
            <label for="exampleInputEmail1">Email</label>
            <input class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection