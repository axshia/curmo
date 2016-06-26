<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    const GOOGLE_AUTH_URL = 'https://www.googleapis.com/oauth2/v1/userinfo';

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

            $user = DB::table('users')
                ->where('google_id', $result['id'])
                ->first();

            if($user === null){
                $user = User::create([
                    'name' => $result['name'],
                    'email' => $result['email'],
                    'google_id' => $result['id']
                ]);
            }


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
        $token  = $request->get('oauth_token');
        $verify = $request->get('oauth_verifier');

        // get twitter service
        $tw = \OAuth::consumer('Twitter');

        // check if code is valid

        // if code is provided get user data and sign in
        if ( ! is_null($token) && ! is_null($verify))
        {
            // This was a callback request from twitter, get the token
            $token = $tw->requestAccessToken($token, $verify);

            // Send a request with it
            $result = json_decode($tw->request('account/verify_credentials.json'), true);

            $message = 'Your unique Twitter user id is: ' . $result['id'] . ' and your name is ' . $result['name'];
            echo $message. "<br/>";

            //Var_dump
            //display whole array.
            dd($result);
        }
        // if not ask for permission first
        else
        {
            // get request token
            $reqToken = $tw->requestRequestToken();

            // get Authorization Uri sending the request token
            $url = $tw->getAuthorizationUri(['oauth_token' => $reqToken->getRequestToken()]);

            // return to twitter login url
            return redirect((string)$url);
        }
    }
}
