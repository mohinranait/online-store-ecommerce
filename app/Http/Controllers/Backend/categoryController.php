<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use File;
use Image;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::orderby('name','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.manage',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::orderby('name','asc')->where('is_parent',0)->get();
        return view('backend.pages.category.create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categorys = new Category();
        $categorys->name        = $request->category;
        $categorys->slug        = Str::slug($request->category);
        $categorys->is_parent   = $request->is_parent;
        $categorys->description = $request->description;

        if( $request->image ){
            $catchImg           = $request->file('image');
            $imgName            = time() ."_" . $catchImg->getClientOriginalName(); 
            $location           = public_path('image/'. $imgName );
            Image::make($catchImg)->save($location);
            $categorys->image   = $imgName;
        }
        $categorys->save();
        return redirect()->route('category.manage')->with('success','Create Successfull');
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
        $category = Category::find($id);
        if( !empty($category)){
            $categorys = Category::where('is_parent',0)->get();
            return view('backend.pages.category.edit', compact('category','categorys'));
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
        $categorys = Category::find($id);
        $categorys->name        = $request->category;
        $categorys->slug        = Str::slug($request->category);
        $categorys->is_parent   = $request->is_parent;
        $categorys->description = $request->description;
        $categorys->status      = $request->status;

        if( $request->image ){
            
            if( File::exists('image/' . $categorys->image)){
                File::delete('image/' . $categorys->image);
            }

            $catchImg           = $request->file('image');
            $imgName            = time() ."_" . $catchImg->getClientOriginalName(); 
            $location           = public_path('image/'. $imgName );
            Image::make($catchImg)->save($location);
            $categorys->image   = $imgName;
        }
        $categorys->save();
        return redirect()->route('category.manage')->with('success','Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorys = Category::find($id);
        if( !empty($categorys)){
            if( File::exists('image/' . $categorys->image)){
                File::delete('image/' . $categorys->image);
            }

            $categorys->delete();
        }else{
            return redirect()->back();
        }
        return redirect()->route('category.manage')->with('delete','Delete Successfull');
    }
}
