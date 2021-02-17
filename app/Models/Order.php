<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    //quan he nhieu nhieu dung bang trung gian product_tags belongsToMany
    public function orderProducts()
    {
    	return $this -> belongsToMany(Product::class,'order_product','orders_id','products_id') -> withTimestamps();
    }
}
