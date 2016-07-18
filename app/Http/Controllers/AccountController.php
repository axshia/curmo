<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    const GOOGLE_AUTH_URL = 'https://www.googleapis.com/oauth2/v1/userinfo';

    const SESSION_NAME_OAUTH = 'OAuth';

    public function index()
    {
        return view('account.index');
    }

    /**
     * 新規アカウント作成
     */
    public function create()
    {
        return view('account.create');
    }

    public function google(Request $request)
    {
        // get data from request
        $code = $request->get('code');

        // get google service
        $googleService = \OAuth::consumer('Google');


        if ($code !== null) {
            // This was a callback request from google, get the token
            $token = $googleService->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($googleService->request(self::GOOGLE_AUTH_URL), true);

            $user = User::firstOrNew([
                'google_id' => $result['id'],
                'deleted_at' => null
            ]);

            if ($user->id !== null) {
                Auth::loginUsingId($user->id, true);
                return redirect('/');
            }

            $user->name = $result['name'];
            $user->email = $result['email'];

            $request->session()->put(self::SESSION_NAME_OAUTH, $user);

            return view('account.input', compact(['user']));


        } else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return redirect((string)$url);
        }
    }

    /**
     * 登録完了
     * @param Request $request
     * @return mixed
     */
    public function complete(Request $request)
    {
        $user = $request->session()->get(self::SESSION_NAME_OAUTH);

        if ($user === null) {
            return redirect('/');
        }

        $request->session()->remove(self::SESSION_NAME_OAUTH);

        $user = User::where(['google_id' => $user['google_id']])
            ->firstOrCreate([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'google_id' => $user['google_id']
            ]);

        Auth::loginUsingId($user->id, true);

        return redirect('/');
    }
}
