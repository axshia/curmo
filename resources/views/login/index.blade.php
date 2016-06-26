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
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="メールアドレス">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="パスワード">
                            </div>

                            <input type="submit" class="btn btn-success" value="ログイン">

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
@stop
