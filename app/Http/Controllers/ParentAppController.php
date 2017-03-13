<?php

namespace App\Http\Controllers;

use App\Nounou;
use App\Parent_app;
use Illuminate\Http\Request;
use Sentinel;


class ParentAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Sentinel::getUser();
        echo 'bonjour '.$user_id;;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id=Sentinel::getUser()->id;
        $inputs = $request->all();
        $inputs['user_id']=$user_id;
        $parent = Parent_app::create($inputs);
        if ($parent){
            return response()->json([
                'parent'=>$parent
            ]);
        }else{
            return redirect(404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parent = Parent_app::find($id);
        $parent->update($request->all());
        if (sizeof($parent)) {
            return response()->json([
                'parent' => $parent
            ], 200);
        } else {
            return redirect(404);


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $parent = Parent_app::find($id);
        if ($parent) {
            $parent->delete();

        }

    }
}
