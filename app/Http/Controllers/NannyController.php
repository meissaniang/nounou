<?php

namespace App\Http\Controllers;

use App\Nanny;
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
        return $user_id=Sentinel::getUser()->first_name;
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
        $nounou = Nanny::create($inputs);
        if ($nounou){
            return response()->json([
                'nounou'=>$nounou
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
        $nounou = Nanny::find($id);
        $nounou->update($request->all());
        if (sizeof($nounou)) {
            return response()->json([
                'nounou' => $nounou
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
        $nounou = Nanny::find($id);
        if ($nounou) {
            $nounou->delete();

        }
    }
}
