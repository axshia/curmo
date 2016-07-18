<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    const GOOGLE_AUTH_URL = 'https://www.googleapis.com/oauth2/v1/userinfo';

    const SESSION_NAME_OAUTH = 'OAuth';

    /**
     * ログイン画面の表示
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * GoogleのOAuth認証を行う
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginWithGoogle(Request $request)
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
                return redirect()->intended('/');
            }

            $user->name = $result['name'];
            $user->email = $result['email'];
            $user->picture = $result['picture'];

            $request->session()->put(self::SESSION_NAME_OAUTH, $user);

            return view('login.input', compact(['user']));

        } else {
            // get googleService authorization
            $url = $googleService->getAuthorizationUri();

            // return to google login url
            return redirect((string)$url);
        }
    }

    public function loginWithTwitter(Request $request)
    {
        // get data from request
        $token = $request->get('oauth_token');
        $verify = $request->get('oauth_verifier');

        // get twitter service
        $tw = \OAuth::consumer('Twitter');

        // check if code is valid

        // if code is provided get user data and sign in
        if (!is_null($token) && !is_null($verify)) {
            // This was a callback request from twitter, get the token
            $token = $tw->requestAccessToken($token, $verify);

            // Send a request with it
            $result = json_decode($tw->request('account/verify_credentials.json'), true);

            $message = 'Your unique Twitter user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message . "<br/>";

            //Var_dump
            //display whole array.
            dd($result);
        } // if not ask for permission first
        else {
            // get request token
            $reqToken = $tw->requestRequestToken();

            // get Authorization Uri sending the request token
            $url = $tw->getAuthorizationUri(['oauth_token' => $reqToken->getRequestToken()]);

            // return to twitter login url
            return redirect((string)$url);
        }
    }

    public function loginWithFacebook(Request $request)
    {
        // get data from request
        $code = $request->get('code');

        // get fb service
        $fb = \OAuth::consumer('Facebook');

        // check if code is valid

        // if code is provided get user data and sign in
        if (!is_null($code)) {
            // This was a callback request from facebook, get the token
            $token = $fb->requestAccessToken($code);

            // Send a request with it
            $result = json_decode($fb->request('/me?fields=id,name,email'), true);

            $message = 'Your unique facebook user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message . "<br/>";

            //Var_dump
            //display whole array.
            dd($result);
        } // if not ask for permission first
        else {
            // get fb authorization
            $url = $fb->getAuthorizationUri();

            // return to facebook login url
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
                'addresses_id' => $request->get('addresses_id'),
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => $request->get('password'),
                'picture' => $user['picture'],
                'google_id' => $user['google_id']
            ]);

        Auth::loginUsingId($user->id, true);

        return redirect('/');
    }

}
