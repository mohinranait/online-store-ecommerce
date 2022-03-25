<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Cuntry;
use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderby('id','desc')->get();
        return view('backend.pages.orders.manage',compact('orders'));
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
        $details = Order::find($id);
        if( !empty($details)){
            return view('backend.pages.orders.details',compact('details'));
        }else{
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Order::find($id);
        if( !empty( $edit)){
            $divisions = Division::orderby('name', 'asc')->where('status',1)->get();
            $districts = District::orderby('name', 'asc')->where('status',1)->get();
            $cuntrys = Cuntry::orderby('name', 'asc')->where('status',1)->get();
            return view('backend.pages.orders.edit',compact('edit','districts','divisions','cuntrys'));
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
        $order = Order::find($id);
        $order->name            = $request->name;
        $order->email           = $request->email;
        $order->phone           = $request->phone;
        $order->address         = $request->address;
        $order->amount          = $request->amount;
        $order->transaction_id  = $request->tranID;
        $order->cuntry          = $request->cuntry;
        $order->division_id     = $request->division;
        $order->district_id     = $request->district;
        $order->massage         = $request->message;
        $order->post_code       = $request->postcode;
        $order->status          = $request->status;
        $order->save();
        return redirect()->route('order.manage')->with('success','Order history Update Successfull');
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
