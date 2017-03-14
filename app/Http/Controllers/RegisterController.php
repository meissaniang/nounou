<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Sentinel;
use Activation;

class RegisterController extends Controller
{
    public function get()
    {
       // return view('authentificate.register');

    }

    public function post(Request $request)
    {
        dd($request);
        $user = Sentinel::registerAndActivate($request->all());
        $role=Sentinel::findRoleBySlug($request['role']);
        $role->users()->attach($user);
        if (sizeof($user)) {
            return response()->json([
                'user' => $user
            ], 200);
        } else {
            return  redirect(404);


        }
    }
    
}
