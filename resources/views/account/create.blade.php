@extends('layouts.main')

@section('page_title')
    新規アカウント登録
@stop

@section('body')

    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        CURMOへようこそ！
                    </div>
                    <div class="panel-body">

                        <form action="">

                            <div class="form-group">
                                <a href="/account/create/google" class="btn btn-block btn-social btn-google">
                                    <span class="fa fa-google"></span>
                                    Sign in with Google
                                </a>
                            </div>
                            <div class="form-group">
                                <a href="/account/create/facebook" class="btn btn-block btn-social btn-facebook">
                                    <span class="fa fa-facebook"></span>
                                    Sign in with Facebook
                                </a>
                            </div>

                            <div class="form-group">
                                <a href="/account/create/twitter" class="btn btn-block btn-social btn-twitter">
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
