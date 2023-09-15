@extends('master')
@section('body')
<div class="form-login" style="
    margin-left: auto;
    margin-right: auto;
    position: absolute;
    top: 40%!important;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 25%;
    height: 25%;
    ">
    <form method="POST" action="{{ route('login.post') }}" style="margin-top: 40%;">
        <div class="form-group">
            @csrf
            @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
            <label for="exampleInputEmail1">メールアドレス</label>
            <input class="form-control" name="email">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">パスワード</label>
            <input class="form-control" type="password" name="password">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-primary">ログイン</button>
        </div>
    </form>
</div>
@endsection