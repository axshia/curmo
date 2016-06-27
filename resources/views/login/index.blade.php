@extends('layouts.main')

@section('page_title')
    ログイン
@stop

@section('body')

    <div class="container">
        <div class="row">

            <div class="col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        ここにメッセージが入る
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        CURMOへログイン
                    </div>
                    <div class="panel-body">
                        <form action="">
                            {{--<div class="form-group">--}}
                                {{--<input type="text" class="form-control" placeholder="メールアドレス">--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<input type="password" class="form-control" placeholder="パスワード">--}}
                            {{--</div>--}}

                            {{--<input type="submit" class="btn btn-success" value="ログイン">--}}

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

                        </form>


                    </div>
                </div>
            </div>
        </div>


    </div>
@stop
