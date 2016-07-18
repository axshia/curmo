<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>

            </button>
            <a class="navbar-brand" href="/">
                <img src="http://placehold.it/150x50&text=Logo" alt="">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">

                <li>
                    <a>
                        <button type="button" class="btn btn-info btn-comment">コメントする</button>
                    </a>
                </li>

                @if($current_user !== null)

                    <li class="dropdown">


                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false"><img src="{{$current_user->picture}}" width="30" height="30"
                                                      class="img-circle"> {{$current_user->name}} <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/account">マイページ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/logout">ログアウト</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>