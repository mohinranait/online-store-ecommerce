<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cuntry;
use Illuminate\Http\Request;

class cuntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuntrys = Cuntry::orderby('name','asc')->get();
        return view('backend.pages.cuntry.manage',compact('cuntrys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.cuntry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cuntrys = new Cuntry();
        $cuntrys->name        = $request->cuntry;
        $cuntrys->status      = $request->status;
        $cuntrys->save();
        return redirect()->route('cuntry.manage')->with('success','Create Successfull');
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
        $cuntry = Cuntry::find($id);
        if( !empty($cuntry)){
            return view('backend.pages.cuntry.edit',compact('cuntry'));
        }
        return redirect()->route('cuntry.manage')->with('success','Create Successfull');
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
        $cuntrys = Cuntry::find($id);
        $cuntrys->name        = $request->cuntry;
        $cuntrys->status      = $request->status;
        $cuntrys->save();
        return redirect()->route('cuntry.manage')->with('success','Create Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuntry = Cuntry::find($id);
        if( !empty( $cuntry)){
            $cuntry->delete();
        }else{
            return redirect()->back();
        }
        return redirect()->route('cuntry.manage')->with('success','Create Successfull');
    }
}
