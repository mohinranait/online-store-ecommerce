<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class divisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisions = Division::all();
        return view('backend.pages.division.manage',compact('divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.division.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $divisions = new Division();
        $divisions->name    = $request->division;
        $divisions->slug    = Str::slug($request->division);
        $divisions->status  = $request->status;
        $divisions->save();
        return redirect()->route('division.manage')->with('success','Create Successfull');
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
       $division = Division::find($id);
       if( !empty($division)){
           return view('backend.pages.division.edit',compact('division'));
       }
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
        $divisions = Division::find($id);
        $divisions->name    = $request->division;
        $divisions->slug    = Str::slug($request->division);
        $divisions->status  = $request->status;
        $divisions->save();
        return redirect()->route('division.manage')->with('success','Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $division = Division::find($id);
        if( !empty($division)){

            $division->delete();
        }else{
            return redirect()->back();
        }
        return redirect()->route('division.manage')->with('success','Delete Successfull');
    }
}
