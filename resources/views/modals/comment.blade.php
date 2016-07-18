<div class="modal fade" tabindex="-1" role="dialog" id="modal-comment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">コメントする</h4>
            </div>

            @if($current_user !== null)

                {{Form::open(['url' => '/comments/create'])}}
                <div class="modal-body">
                    <div class="form-group">
                        {{Form::textarea('detail',null,['class'=>'form-control','rows'=>3])}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                    {{Form::submit('コメントする',['class'=>'btn btn-success'])}}
                </div>
                {{Form::close()}}
            @else
                <div class="modal-body">

                    <div class="row">

                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                            <p>コメントをするにはログインが必要です。</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-8 col-xs-8 col-lg-offset-0 col-md-offset-0 col-sm-offset-2 col-xs-offset-2">
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
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                </div>
            @endif
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->