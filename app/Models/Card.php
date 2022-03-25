<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','product_qty','unite_price','order_id','user_id','ip_address'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

    // User Total Add To Card items function
    public static function totalItems(){
        if( Auth::check()){
            $cards = Card::where('user_id', Auth::user()->id)->where('order_id', NULL)->get();
        }
        $cards = Card::where('ip_address', request()->ip() )->where('order_id', NULL)->get();

        return $cards;
    }

    // User Total Add To Card items function
    public static function totalCardItem(){
        if( Auth::check()){
            $cards = Card::where('user_id', Auth::user()->id)->where('order_id', NULL)->get();
        }
        $cards = Card::where('ip_address', request()->ip() )->where('order_id', NULL)->get();

        $totalAddToCard = 0;
        foreach( $cards as $card){
            $totalAddToCard += $card->product_qty;
        }
        return $totalAddToCard;
    }

    // User Totla card Price
    public static function totlaPrice ()
    {
        if( Auth::check()){
            $cards = Card::where('user_id', Auth::id())->where('order_id', NULL)->get(); 
        }
        $cards = Card::where('ip_address', request()->ip())->where('order_id', NULL)->get(); 

        $totalPrice = 0;

        foreach( $cards as $card){
            if( !empty( $card->product->offer_price)){
                $totalPrice += $card->product->offer_price * $card->product_qty;
            }else{
                $totalPrice += $card->product->regularprice * $card->product_qty;
            }
        }
        return $totalPrice;
    }
}
