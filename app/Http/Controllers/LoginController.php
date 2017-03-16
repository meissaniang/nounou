<?php

namespace App\Http\Controllers;

use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Http\Request;
use Sentinel;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function logout()
    {
        dd(Sentinel::getUser());
        Sentinel::logout();
        return Sentinel::getUser();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sentinel::authenticate($request->all());
        if (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'admin') {
            return redirect()->route('admin.index');
        } elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'nanny') {
            return redirect()->route('nanny.show',Sentinel::getUser()->id);
        } elseif (Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'parent') {
            return redirect()->route('parent.index');

        } else {

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = EloquentUser::find($id);
        $request = $request->toArray();
        $user = Sentinel::update($user, $request);
        if (sizeof($user)) {
            return response()->json([
                'user' => $user
            ], 200);
        } else {
            return redirect(404);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = EloquentUser::find($id);
        if ($user) {
            $user->delete();

        }

    }
}
