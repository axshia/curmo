@extends('layouts.main')

@section('page_title')
    車で困ったときのQ&Aコミュニティ
@stop

@section('body')

    <div class="container">
        <div class="row">

            <div class="col-sm-12 col-xs-12 hidden-lg hidden-md">
                @include('components.sidebar')
            </div>

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                @foreach($comments as $comment)
                    <div class="panel panel-default card">

                        {{--PC--}}
                        <div class="panel-body hidden-sm hidden-xs">
                            <div class="col-lg-2 col-md-2">
                                <a href="#">
                                    <img class="img-responsive img-circle" src="{{$comment->picture}}" width="100"
                                         height="100">
                                </a>
                            </div>
                            <div class="col-lg-10 col-md-10">
                                <div class="row card-header">
                                    <div class="text-left">
                                        <a href="#">{{$comment->name}}</a>

                                        <small><span class="fa fa-map-marker"></span>
                                            <a href="/?area={{$comment->addresses_id}}">{{\App\Models\Addresses::getName($comment->addresses_id)}}</a>
                                            ５分前
                                        </small>
                                    </div>
                                </div>
                                <div class="text-left">
                                    <p>{{$comment->detail}}</p>
                                </div>
                            </div>
                        </div>

                        {{--Mobile--}}
                        <div class="panel-body hidden-lg hidden-md">
                            <div class="row card-header">
                                <div class="col-sm-2 col-xs-3">
                                    <a href="#">
                                        <img class="img-responsive img-circle" src="{{$comment->picture}}" width="80"
                                             height="80">
                                    </a>
                                </div>
                                <div class="col-sm-10 col-xs-9 card-detail">
                                    <div><a href="#">{{$comment->name}}</a></div>

                                    <small><span class="fa fa-map-marker"></span>
                                        <a href="/?area={{$comment->addresses_id}}">{{\App\Models\Addresses::getName($comment->addresses_id)}}</a>
                                        ５分前
                                    </small>
                                </div>
                            </div>
                            <div class="row col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <p>{{$comment->detail}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="panel-footer text-right">
                            <a href="#">返信する</a>
                        </div>
                    </div>
                @endforeach

                {{ $comments->appends(Request::only('area'))->links() }}

            </div>

            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
                @include('components.sidebar')
            </div>
        </div>
    </div>
@stop
