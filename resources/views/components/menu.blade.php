<div class="col-lg-4">
    <a href="{{ route('root') }}"><img src="https://img-files-original.s3-ap-northeast-1.amazonaws.com/masarudo.png"></a>
    @if( Auth::check() )
    <h2 class="mt-8">AccountInfo</h2>
    <table class="table">
        <tr>
            <th>ユーザーID</th>
            <td>{{ $user->user_id }}</td>
        </tr>
        <tr>
            <th>ハンドルネーム</th>
            <td>{{ $user->user_name }}</td>
        </tr>
    </table>
    @endif
    <h2 class="mt-8">Items</h2>
    <a href="{{ route('root') }}" class="btn btn-primary col-lg-12">商品一覧</a>
    @if( Auth::check() )
    <a href="{{ route('items.create') }}" class="btn btn-primary col-lg-12 mt-2">商品登録</a>
    <a href="{{ route('genres.index') }}" class="btn btn-primary col-lg-12 mt-2">ジャンル一覧</a>
    @endif
    <h2 class="mt-8">AccountMenu</h2>
    @if( Auth::check() )
    <a href="{{ route('profile.index') }}" class="btn btn-primary col-lg-12">会員情報</a>
    <a href="{{ route('trades.index') }}" class="btn btn-primary col-lg-12 mt-2">取引中商品一覧</a>
    <a href="{{ route('buys.index') }}" class="btn btn-primary col-lg-12 mt-2">購入商品一覧</a>
    <a href="{{ route('sells.index') }}" class="btn btn-primary col-lg-12 mt-2">出品商品一覧</a>
    <a href="{{ route('addresses.index') }}" class="btn btn-primary col-lg-12 mt-2">配送先情報</a>
    <a href="{{ route('banks.index') }}" class="btn btn-primary col-lg-12 mt-2">口座情報</a>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <input type="submit" value="ログアウト" class="btn btn-danger col-lg-12 mt-2">
    </form>
    @else
    <a href="{{ route('register') }}" class="btn btn-primary col-lg-12 mt-2">新規登録</a>
    <a href="{{ route('login') }}" class="btn btn-primary col-lg-12 mt-2">ログイン</a>
    @endif
</div>