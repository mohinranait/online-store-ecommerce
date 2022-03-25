<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cuntry;
use App\Models\Division;
use App\Models\District;
use App\Models\Card;
use Illuminate\Http\Request;
use DB;

class frontendController extends Controller
{
    // Home page
    public function homepage()
    {
        $latestProduct = Product::where('status',1)->latest()->get();
        $random = Product::inRandomOrder()->where('status',1)->limit(8)->get();
        $categorys = Category::where('status',1)->where('is_parent',0)->get();
        return view('frontend.pages.home',compact('latestProduct','categorys','random'));
    }
  

    // Product Display by Row wish
    public function shop2()
    {
        $totalProducts = DB::table('products')->count();
        $products = Product::where('status',1)->limit(9)->latest()->get();
        return view('frontend.pages.shop2col',compact('products','totalProducts'));
    }

    // Product Display by 3 Column
    public function shop3()
    {
        $totalProducts = DB::table('products')->count();
        $products = Product::where('status',1)->limit(9)->latest()->get();
        return view('frontend.pages.shop3col',compact('products','totalProducts'));
    }

    // Product Display by 4 Column
    public function shop4()
    {
        $totalProducts = DB::table('products')->count();
        $products = Product::where('status',1)->limit(12)->latest()->get();
        return view('frontend.pages.shop4col',compact('products','totalProducts'));
    }

    // primary category wish product Dispaly 
    public function primaryCategory($slug){
        $categorys  = Category::where('slug', $slug)->first();
        if( !empty($categorys)){
            return view('frontend.pages.primary-category',compact('categorys'));
        }
    }

    // Sub Category wish product Display
    public function subCategory($slug){
        $categorys = Category::where('slug', $slug)->first();
        if( !empty($categorys)){
            $relatedCategory = $categorys->id;
            $products = Product::where('status',1)->where('cat_id', $relatedCategory)->limit(9)->get();
            return view('frontend.pages.sub-category',compact('categorys','products'));
        }else{
            return redirect()->back();
        }
    }

    public function offerSell(){
        $offerproductCount = DB::table('products')->where('is_fiture',1)->where('status',1)->count();
        $products = Product::where('status',1)->where('is_fiture',1)->limit(9)->latest()->get();
        return view('frontend.pages.selling-offer',compact('products','offerproductCount'));
    }

    // Product Search Function
    public function search(Request $request){
        $products = Product::orderby('id','desc')->where('name',"LIKE", '%'. $request->search . "%");

        if( $request->category != "ALL"){ 
            $products->where('cat_id', $request->category);
        };
        $products = $products->get();
        return view('frontend.pages.search',compact('products'));
    }

    //Product Details page
    public function detailsProduct($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if( !empty($product)){
            $relatedCategory = $product->cat_id;
            $categorys = Category::where('id', $relatedCategory)->get();
            
            return view('frontend.pages.details',compact('product','categorys'));
        }else{
            return redirect()->back();
        }
    }

    // checkout page
    public function checkout(){
        $cards = Card::orderby('id','desc')->where('order_id',null)->get();
        $divisions = Division::orderby('name','asc')->where('status',1)->get();
        $districts = District::orderby('name','asc')->where('status',1)->get();
        $cuntrys = Cuntry::orderby('name','asc')->where('status',1)->get();
        return view('frontend.pages.checkout',compact('cuntrys','districts','divisions','cards'));
    }




    
}
