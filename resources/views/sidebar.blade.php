<aside class="sidebar">
    <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
    </div>
    <div class="side-inner">
        <div class="nav-menu">

            <ul>
                <li>
                    <a href="#" class="d-flex align-items-center">
                        <span class="menu-text">
                            <h1 style="justify-content: center; align-items: center;">サイドメニュー</h1>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/home" class="d-flex align-items-center">
                        <span class="menu-text">本部ユーザー一覧</span>
                    </a>
                </li>
                <li>
                    <a href="/list-owners" class="d-flex align-items-center">
                        <span class="menu-text">加盟店ユーザー一覧</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="d-flex align-items-center" data-toggle="modal" data-target="#exampleModal">
                        <span class="menu-text">ログアウト</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">確認</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center;">
                ログアウトしますか？
            </div>
            <div class="modal-footer" style="text-align: center;display:flow">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
                <button type="button" class="btn btn-primary">
                    <a href="/logout" style="color: white;">はい</a>
                </button>
            </div>
        </div>
    </div>
</div>