<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','sort_description','details','otherinformation','brand_id','color_id','cat_id','quentity','regularprice','offer_price','tags','is_fiture','status'];

    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function color(){
        return $this->belongsTo(Color::class,'color_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }
    public function imagess(){
        return $this->hasMany(productImage::class);
    }
    public static function productCount($id){
        $product = Product::orderby('name','asc')->where('cat_id', $id)->count();
        return $product;
    }
   
    
}
