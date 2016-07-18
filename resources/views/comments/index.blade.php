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
                @include('components.sidebar')
            </div>

        </div>

    </div>

@stop