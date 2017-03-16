<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Users\UserInterface;
use Illuminate\Http\Request;
use App\SocialAccountService;
use Socialite;
class SocialAuthController extends Controller
{

    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
        $request['email']=$user->email;
        $request['first_name']=$user->name;
        // $checkuser = $this->user->findOrCreateSocialUser('facebook',$user->id,$user);
        //$user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        dd($request);
    }

}