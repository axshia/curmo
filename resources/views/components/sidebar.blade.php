@if($current_user === null)
    <div class="panel panel-default">
        <div class="panel-heading">ログイン</div>
        <div class="panel-body">
            <div class="form-group">
                <a href="/login/google" class="btn btn-block btn-social btn-google">
                    <span class="fa fa-google"></span>
                    Sign in with Google
                </a>
            </div>
            <div class="form-group">
                <a href="/login/facebook" class="btn btn-block btn-social btn-facebook">
                    <span class="fa fa-facebook"></span>
                    Sign in with Facebook
                </a>
            </div>

            <div class="form-group">
                <a href="/login/twitter" class="btn btn-block btn-social btn-twitter">
                    <span class="fa fa-twitter"></span>
                    Sign in with Twitter
                </a>
            </div>
        </div>
    </div>
@endif

@php($addresses = \App\Models\Addresses::getAll())

<div class="panel panel-default hidden-sm hidden-xs">
    <div class="panel-heading">都道府県</div>
    <div class="panel-body">
        <div class="list-group">
            @foreach($addresses as $address)
                <a class="list-group-item" href="?area={{$address['id']}}">
                    {{$address['name']}}
                </a>
            @endforeach
        </div>
    </div>
</div>