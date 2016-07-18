<div class="container-fluid footer">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <h4>CURMO</h4>
        <ul>
            <li><a href="/">HOME</a></li>
            <li>このサイトについて</li>
            <li>利用規約</li>
            <li>サイトマップ</li>
        </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
        <h4>アカウント</h4>
        <ul>
            <li><a href="/account">マイページ</a></li>
            @if($current_user === null)
                <li><a href="/login">ログイン</a></li>
            @endif
            @if($current_user !== null)
                <li><a href="/logout">ログアウト</a></li>
            @endif
        </ul>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

        <h4>都道府県一覧</h4>

        @php($addresses = \App\Models\Addresses::getAll())

        @foreach($addresses as $address)
            <a href="/?area={{$address['id']}}">
                {{$address['name']}}
            </a>
        @endforeach
    </div>
</div>

@include('modals.comment')