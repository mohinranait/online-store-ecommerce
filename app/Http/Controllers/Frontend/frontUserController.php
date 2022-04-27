<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cuntry;
use App\Models\Division;
use App\Models\District;
use App\Models\Card;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;
use File;
use Image;

class frontUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $divisions = Division::orderby('name','asc')->where('status',1)->get();
        $districts = District::orderby('name','asc')->where('status',1)->get();
        $cuntrys = Cuntry::orderby('name','asc')->where('status',1)->get();
        $orders = Order::orderby('id','desc')->where('user_id', Auth::id())->get();
        $cards = Card::orderby('id','desc')->get();
       return view('frontend.pages.customer.dashboard',compact('divisions','orders','districts','cuntrys','cards'));
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
        $users->name            = $request->name;
        $users->phone           = $request->phone;
        $users->address         = $request->address;
        $users->cuntry          = $request->cuntry;
        $users->zipcode         = $request->zipcode;
        $users->division_id     = $request->district;
        $users->destrict_id     = $request->division;

        if( $request->image){
            $catchImg = $request->file('image');
            $imgName = time() . "_" . $catchImg->getClientOriginalName();
            $location = public_path('image/' . $imgName);
            Image::make($catchImg)->save($location);
            $users->image = $imgName;
        }

        $users->save();
        return redirect()->route('user.dashboard')->with('success','Profile Update');
       
    }


    public function invoce( $id){
       
        $invoice = Order::find($id);
        if(!empty($invoice)){
            $invoiceItems = Card::orderby('id','desc')->where('order_id', $invoice->id)->get();
            return view('frontend.pages.customer.invoice',compact('invoice','invoiceItems'));
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
        //
    }
}
