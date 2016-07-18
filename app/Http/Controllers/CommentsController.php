<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

/**
 * Class CommentsController
 *
 * @package App\Http\Controllers
 */
class CommentsController extends Controller
{

    /**
     * 一覧画面
     *
     * @return mixed
     */
    public function index()
    {
        return view('comments/index');
    }

    /**
     ** コメント投稿画面
     *
     * @return mixed
     */
    public function create()
    {
        if (Input::all()) {
            Input::all();

            Comments::create([
                'users_id' => Auth::user()->id,
                'detail' => Input::get('detail')
            ]);

            return redirect('/');
        }

        return view('comments/create');
    }

}
