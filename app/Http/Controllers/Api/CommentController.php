<?php

namespace App\Http\Controllers\Api;

use App\Models\Search;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CommentController extends BaseController
{
    /**
     * コメント一覧出力
     * @param Request $request
     */
    public function index(Request $request)
    {
        $comments = Search::getComments($request);

        return $comments;
    }
}
