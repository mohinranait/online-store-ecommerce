<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug','division_id','status'];

    public function district(){
        return $this->belongsTo(Division::class , 'division_id');
    }
}
