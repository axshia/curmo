<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/**
 * Class QuestionsController
 *
 * @package App\Http\Controllers
 */
class QuestionsController extends Controller
{

    /**
     * 一覧画面
     *
     * @return mixed
     */
    public function index()
    {
        return view('questions/index');
    }

    /**
     * 質問投稿画面
     *
     * @return mixed
     */
    public function create()
    {
        return view('questions/create');
    }
}
