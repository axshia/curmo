<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Search;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $comments = Search::getComments($request);

        return view('welcome', compact(['comments']));
    }
}
