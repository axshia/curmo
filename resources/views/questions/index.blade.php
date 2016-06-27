@extends('layouts.main')

@section('page_title')
    最近の質問一覧
@stop

@section('body')

    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <?php for ($i = 0;$i < 10;$i++):?>
                <div class="panel panel-default">
                    <div class="panel-body">
                        質問です！
                    </div>
                </div>
                <?php endfor;?>

            </div>

            <div class="col-lg-4">

                <div class="panel panel-default">
                    <div class="panel-heading">新しい質問をする</div>
                    <div class="panel-body">
                        <button type="button" class="btn btn-info">質問してみる</button>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">サイドバー</div>
                    <div class="panel-body">
                        ここにコンテンツが入ります
                    </div>
                </div>
            </div>

        </div>

    </div>

@stop