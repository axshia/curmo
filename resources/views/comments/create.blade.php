@extends('layouts.main')

@section('page_title')
    新しい質問
@stop

@section('body')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">新しい質問をする</div>
            <div class="panel-body">

                {{Form::open()}}
                <div class="form-group">
                    {{Form::textarea('detail',null,['class'=>'form-control'])}}
                </div>
                {{Form::submit('コメントする',['class'=>'btn btn-success'])}}
                {{Form::close()}}

            </div>
        </div>
    </div>

@stop