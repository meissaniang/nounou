<?php

namespace App\Http\Controllers;

use App\Nanny;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Http\Request;
use Sentinel;
use Session;

class NannyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nanny = Nanny::paginate(5);
        if (sizeof($nanny)) {
            return response()->json([
                'nanny'=>$nanny
            ]);
        }else{
            return response()->json([
                'nanny'=>'no data'
            ]);
        }

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


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Sentinel::getUser()->id;
        $inputs = $request->all();
        $inputs['user_id'] = $user_id;
        $nanny = Nanny::create($inputs);
        if ($nanny) {
            return response()->json([
                'nounou' => $nanny
            ]);
        } else {
            return redirect(404);
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
        $user=EloquentUser::find($id);
        dd($user->toarray());
        $nany = Nanny::find($id);
        if ($nany){
            return response()->json([
                'nanny'=>$nany
            ]);
        }else{
            return response()->json([
                'error'=>'no data'
            ]);
        }
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
        $nanny = Nanny::find($id);
        $nanny->update($request->all());
        if (sizeof($nanny)) {
            return response()->json([
                'nanny' => $nanny
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
        $nanny = Nanny::find($id);
        if ($nanny) {
            $nanny->delete();

        }
    }
}
