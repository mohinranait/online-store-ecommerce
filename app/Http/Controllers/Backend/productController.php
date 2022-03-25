<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Cuntry;
use App\Models\subCategory;
use App\Models\Product;
use App\Models\productImage;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.pages.product.manage',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderby('name' , 'asc')->get();
        $categorys = Category::orderby('name' , 'asc')->where('is_parent',0)->get();
        
        $colors = Color::orderby('color' , 'asc')->get();
        return view('backend.pages.product.create',compact('brands','categorys','colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|unique:products|max:100,name',
            'regularprice' => 'required',
            'quentity' => 'required',
        ]);
        $this->validate($request , [
            'image' => 'required|unique:product_images,image',
        ]);
        
        $products = new Product();
        $products->name             = $request->name;
        $products->slug             = Str::slug($request->name);
        $products->details          = $request->details;
        $products->otherinformation = $request->otherinformation;
        $products->sort_description = $request->sort_description;
        $products->brand_id         = $request->brand;
        $products->color_id         = $request->color;
        $products->cat_id           = $request->category;
        $products->quentity         = $request->quentity;
        $products->regularprice     = $request->regularprice;
        $products->offer_price      = $request->ofer_price;
        $products->tags             = $request->tags;
        $products->is_fiture        = $request->is_fiture;
        $products->status           = $request->status;

        $products->save();

        if( count($request->image) > 0){
            foreach( $request->image as $itemImg){
                $imgName = rand(1,999999) . "_" . $itemImg->getClientOriginalName();
                $location = public_path('image/' . $imgName);
                Image::make($itemImg)->save($location);

                $newImage = new productImage();
                $newImage->product_id = $products->id;
                $newImage->image = $imgName;
                $newImage->save();
            }
        }

        return redirect()->route('product.manage')->with('success','Create Successfull');

        


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
        //
    }
}
