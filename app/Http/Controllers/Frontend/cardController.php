<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;
use Auth;

class cardController extends Controller
{
    // Card page     
    public function card()
    {
        $cards = Card::orderby('id','desc')->where('order_id',null)->get();
        return view('frontend.pages.card',compact('cards'));
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
        if( Auth::check() ){
            $card = Card::where('user_id', Auth::user()->id)->where("product_id" , $request->product_id)->first();
        }
        $card = Card::where('ip_address', request()->ip())->where('product_id', $request->product_id)->first();

        if(!empty($card)){
            if( empty(Card::where('order_id',null))){
                $card->increment('product_qty');
                return redirect()->back();
            }else{
                $card = new Card();
                if( Auth::check()){
                    $card->user_id  = Auth::user()->id;
                }
                $card->ip_address   = request()->ip();
                $card->unite_price  = $request->unite_price;
                $card->product_id   = $request->product_id;
                $card->product_qty  = $request->product_qty;
                $card->save();
    
                return redirect()->back();
            }
        }else{
            return redirect()->route('login')->with('success','Login First, Then Add to card');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $card = Card::find($id);
        if( !empty($card)){
            $card->delete();
        }
        return redirect()->back();
    }
}
