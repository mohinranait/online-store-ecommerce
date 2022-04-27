<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = ['product_id','user_id','comment','star','status'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
