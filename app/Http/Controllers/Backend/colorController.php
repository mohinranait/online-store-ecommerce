<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;


class colorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('backend.pages.color.manage',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $colors = new Color();
        $colors->color      = $request->color;
        $colors->slug       = Str::slug($request->color);
        $colors->status     = $request->status;

        if( $request->image ){
            $catchImg           = $request->file('image');
            $imgName            = time() ."_" . $catchImg->getClientOriginalName(); 
            $location           = public_path('image/'. $imgName );
            Image::make($catchImg)->save($location);
            $colors->image   = $imgName;
        }

        $colors->save();
        return redirect()->route('color.manage')->with('success','Create Successfull');
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
        $color = Color::find($id);
        if( !empty($color)){
            return view('backend.pages.color.edit', compact('color'));
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
        $colors = Color::find($id);
        $colors->color      = $request->color;
        $colors->slug       = Str::slug($request->color);
        $colors->status     = $request->status;

        if( $request->image ){

            if( File::exists('image/' . $colors->image)){
                File::delete('image/' . $colors->image);
            }

            $catchImg           = $request->file('image');
            $imgName            = time() ."_" . $catchImg->getClientOriginalName(); 
            $location           = public_path('image/'. $imgName );
            Image::make($catchImg)->save($location);
            $colors->image   = $imgName;
        }

        $colors->save();
        return redirect()->route('color.manage')->with('success','Create Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colors = Color::find($id);
        if( !empty($colors)){
            if( File::exists('image/' . $colors->image)){
                File::delete('image/' . $colors->image);
            }

            $colors->delete();
        }else{
            return redirect()->back();
        }
        return redirect()->route('color.manage')->with('success','Delete Successfull');
    }
}
