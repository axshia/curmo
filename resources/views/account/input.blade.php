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
                        {{ Form::open(['url' => '/account/create/complete']) }}

                        <div class="form-group">
                            {{ Form::label('ユーザー名', null, ['class' => 'control-label']) }}
                            {{ Form::text('name', $user->name, array_merge(['class' => 'form-control'])) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('メールアドレス', null, ['class' => 'control-label']) }}
                            {{ Form::text('email', $user->email, array_merge(['class' => 'form-control'])) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('パスワード', null, ['class' => 'control-label']) }}
                            {{ Form::text('password', null, array_merge(['class' => 'form-control'])) }}
                        </div>

                        <div class="form-group">
                            @php($addresses = \App\Models\Addresses::getList())
                            {{ Form::label('お住いの地域', null, ['class' => 'control-label']) }}
                            {{ Form::select('addresses_id', $addresses,null, array_merge(['class' => 'form-control'])) }}
                        </div>

                        {{ Form::submit('CURMOをはじめる',['class'=>'btn btn-success']) }}

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>


    </div>
@stop
