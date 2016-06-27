@extends('layouts.main')

@section('page_title')
    新しい質問
@stop

@section('body')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">新しい質問をする</div>
            <div class="panel-body">
                <form action="">
                    <div class="form-group">
                        <input type="text" placeholder="質問タイトル" class="form-control">
                    </div>

                    <div class="form-group">
                        <textarea class="form-control" rows="10" placeholder="質問の詳細をわかりやすく書こう！"></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">確認画面へ</button>
                </form>
            </div>
        </div>
    </div>

@stop