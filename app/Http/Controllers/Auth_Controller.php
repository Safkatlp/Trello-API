<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialite;
use Hash;
use Str;


class Auth_Controller extends Controller
{
    //
    function index(){
        //     $data =Http::get('https://trello.com/1/OAuthGetRequestToken?oauth_consumer_key=3457f595cec5cb7b827b5bd15ba5ba32&oauth_signature_method=HMAC-SHA1&oauth_timestamp=1645038392&oauth_nonce=WxiPiJ&oauth_version=1.0&oauth_signature=F63xtKveanUI5ZiHPjVzYpbj2oM=');
        //    $d= explode('&',$data);
        //     return $d;
        return view('authorize');
        }
    
    
        function trello(){
            $user = Socialite::driver('trello')->redirect();
            dd($user);
            return $user;
        }

        function redirectToApp(){
            return "redirect";
        }
}