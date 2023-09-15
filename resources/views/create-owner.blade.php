@extends('master')
@section('body')
@extends('sidebar')
<main>
    <div class="site-section">
        <div class="container">
            <h2>加盟店ユーザー作成</h2>
            <br>
            <form method="POST" action="{{ route('store.owner') }}" style="width: 80%;">
                @csrf
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="form-group">
                    @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                    @endif
                    <label for="exampleInputEmail1">加盟店</label>
                    <select class="form-control form-select" name="store_id" id="">
                        <option selected>加盟店を選択</option>
                        @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
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
                    <label for="exampleInputPassword1">名前</label>
                    <input class="form-control" name="name">
                    @error('password')
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
                    <button type="submit" class="btn btn-primary">作成</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection