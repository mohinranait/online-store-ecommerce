<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use Illuminate\Http\Request;
use File;
use Image;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.user.manage',compact('users'));
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::find($id);
        if( !empty($user)){
            $districts = District::all();
            $divisions = Division::all();
            return view('backend.pages.user.edit', compact('user','districts','divisions'));
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
        $users = User::find($id);
        $users->name        = $request->name;
        $users->email       = $request->email;
        $users->phone       = $request->phone;
        $users->destrict_id = $request->district;
        $users->division_id = $request->division;
        $users->role        = $request->role;
        $users->status      = $request->status;

        if( $request->image ){

            if( File::exists('image/'.$users->image)){
                File::delete('image/'.$users->image);
            }

            $catchImg   = $request->file('image');
            $imgName    = time() . "_" . $catchImg->getClientOriginalName();
            $location   = public_path('image/' . $imgName);
            Image::make($catchImg)->save($location);
            $users->image = $imgName;
        }

        $users->save();
        return redirect()->route('user.manage')->with('success','Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
