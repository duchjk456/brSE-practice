@extends('master')
@section('body')
@extends('sidebar')
<main>
    <div class="site-section">
        <div class="container">
            <h2>本部ユーザー編集</h2>
            <br>
            <form method="POST" action="{{ route('update.admin', ['id' => $admin->id]) }}" style="width: 80%;">
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
                    <label for="exampleInputEmail1">グループ</label>
                    <select class="form-control form-select" name="group_id" id="">
                        <option selected value="{{ $admin->group_id }}">{{ $admin->group->name }}</option>
                        @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
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
                    <input class="form-control" name="email" value="{{ $admin->email }}">
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">名前</label>
                    <input class="form-control" name="name" value="{{ $admin->name }}">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">パスワード</label>
                    <input class="form-control" type="password" name="password" value="{{ $admin->password }}">
                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group" style="text-align: center;">
                    <button type="submit" class="btn btn-primary">編集</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection