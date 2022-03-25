<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','is_parent','description','image','status'];

   public function products(){
       $product = Product::orderby('name','asc')->count();
       return $product;
   }
}
