<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['email','phone','amount','address','transaction_id','currency','user_id','ip_address','cuntry','division_id','district_id','massage','is_paid','post_code','status'];

    public function division(){
        return $this->belongsTo(Division::class,'division_id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id');
    }
    public function adCuntry(){
        return $this->belongsTo(Cuntry::class,'cuntry');
    }
    public function product(){
        return $this->belongsTo(Product::class,'cuntry');
    }

}
