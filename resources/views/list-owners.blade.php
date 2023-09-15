@extends('master')
@section('css')
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('body')
@extends('sidebar')
<main>
    <div class="site-section">
        <div class="container" style="width:80%; margin: left 10%;">
            <h2>加盟店ユーザー一覧</h2>
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <div>
                <button class="btn btn-primary"><a href="/owner-creat" style="color: white;">ユーザー新規作成</a></button>
                <br>
                <br>
            </div>
            <div class="row justify-content-center">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>加盟店名</th>
                            <th>メールアドレス</th>
                            <th>名前</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($owners as $owner)
                        <tr>
                            <td>{{ $owner->id }}</td>
                            <td>{{ $owner->store->name }}</td>
                            <td>{{ $owner->email}}</td>
                            <td>{{ $owner->name}}</td>
                            <td><button class="btn btn-primary"><a
                                        href="{{ route('edit.owner', ['id' => $owner->id]) }}"
                                        style="color:white">編集</a></button></td>
                            <td>
                                @if ($owner->status == 0)
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmUnblock">
                                    <a href="#" style="color:white">有効</a>
                                </button>
                                <!-- Modal confirm unblock-->
                                <div class="modal fade" id="modalConfirmUnblock" tabindex="-1" role="dialog"
                                    aria-labelledby="modalConfirm" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalConfirm" style="text-align: center;">確認
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align: center;">
                                                加盟店ユーザーを有効にしますか？
                                            </div>
                                            <div class="modal-footer" style="text-align: center;display:flow">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">いいえ</button>
                                                <button type="button" class="btn btn-primary">
                                                    <a href="{{ route('unblock.owner', ['id' => $owner->id]) }}"
                                                        style="color: white;">はい</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($owner->status == 1)
                                <button class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmBlock">
                                    <a href="#" style="color:white">無効</a>
                                </button>
                                <!-- Modal confirm block-->
                                <div class="modal fade" id="modalConfirmBlock" tabindex="-1" role="dialog"
                                    aria-labelledby="modalConfirm" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalConfirm" style="text-align: center;">確認
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" style="text-align: center;">
                                                加盟店ユーザーを無効にしますか？
                                            </div>
                                            <div class="modal-footer" style="text-align: center;display:flow">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">いいえ</button>
                                                <button type="button" class="btn btn-primary">
                                                    <a href="{{ route('block.owner', ['id' => $owner->id]) }}"
                                                        style="color: white;">はい</a>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
new DataTable('#example');
</script>
@endsection