@extends('layouts.main')

@section('page_title')
    マイページ
@stop

@section('body')
    <div class="container">
        <div class="col-lg-3 col-md-3">
            <img src="https://placehold.jp/200x200.png" alt="">
            <h4>上本 遼</h4>

            <div class="form-group">
                <button class="btn btn-success">いいね！</button>
            </div>

            <p>
                自己紹介文が入ります自己紹介文が入ります自己紹介文が入ります自己紹介文が入ります自己紹介文が入ります自己紹介文が入ります
            </p>
        </div>
        <div class="col-lg-9 col-md-9">

            <ul class="nav nav-tabs nav-tabs-justified">
                <li class="active"><a href="#profile" data-toggle="tab"><span class="fa fa-user" aria-hidden="true"></span> プロフィール</a></li>
                <li><a href="#sns" data-toggle="tab"><span class="fa fa-cloud" aria-hidden="true"></span> SNS連携</a></li>
            </ul>

            <div class="panel panel-default panel-profile tab-content">
                <div class="panel-body active tab-pane" id="profile">
                    プロフィール
                </div>
                <div class="panel-body tab-pane" id="sns">
                    SNS
                </div>
            </div>
        </div>
    </div>
@stop