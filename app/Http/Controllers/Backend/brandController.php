<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class brandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.pages.brand.manage',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brands = new Brand();
        $brands->name        = $request->brand;
        $brands->slug        = Str::slug($request->brand);
        $brands->description = $request->description;

        $brands->save();
        return redirect()->route('brand.manage')->with('success','Update Successfull');
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
        $brand = brand::find($id);
        if( !empty($brand)){
            return view('backend.pages.brand.edit', compact('brand'));
        }else{
            return redirect()->back();
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
        $brands = Brand::find($id);
        $brands->name        = $request->brand;
        $brands->slug        = Str::slug($request->brand);
        $brands->description = $request->description;
        $brands->status = $request->status;

        $brands->save();
        return redirect()->route('brand.manage')->with('success','Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if( !empty($brand)){

            $brand->delete();
        }else{
            return redirect()->back();
        }
        return redirect()->route('brand.manage')->with('success','Delete Successfull');
    }
}
