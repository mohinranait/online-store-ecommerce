<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class districtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::all();
        return view('backend.pages.district.manage',compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions = Division::all();
        return view('backend.pages.district.create',compact('divisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $districts = new District();
        $districts->name        = $request->district;
        $districts->slug        = Str::slug($request->district);
        $districts->division_id = $request->division;
        $districts->status      = $request->status;
        $districts->save();
        return redirect()->route('district.manage')->with('success','Create Successfull');
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
        $district = District::find($id);
       if( !empty($district)){
        $divisions = Division::all();
           return view('backend.pages.district.edit',compact('district','divisions'));
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
        $districts = District::find($id);
        $districts->name        = $request->district;
        $districts->slug        = Str::slug($request->district);
        $districts->division_id = $request->division;
        $districts->status      = $request->status;
        $districts->save();
        return redirect()->route('district.manage')->with('success','Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::find($id);
        if( !empty($district)){

            $district->delete();
        }else{
            return redirect()->back();
        }
        return redirect()->route('district.manage')->with('success','Delete Successfull');
    }
}
