<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    //quan het 1 nhieu voi bang productImage dung hasMany
    public function images()
    {
    	return $this -> hasMany(ProductImage::class,'product_id');
    }

    //quan he 1 nhieu voi bang product attribute

    public function attributes()
    {
        return $this -> hasMany(ProductAttribute::class,'product_id');
    }

    //quan he voi bang reviews

    public function reviews()
    {
        return $this -> hasMany(Review::class,'product_id');
    }

    //quan he nhieu nhieu dung bang trung gian product_tags belongsToMany
    public function tags()
    {
    	return $this -> belongsToMany(Tag::class,'product_tags','product_id','tag_id') -> withTimestamps();
    }

    //quan he belongto den bang category

    public function category()
    {
        return $this -> belongsTo(Category::class,'category_id');
    }
    
    //quan he voi bang Brand

    public function brand()
    {
        return $this -> belongsTo(Brand::class,'brand_id');
    }

    /*public function productOrder()
    {
        return $this -> belongsToMany(Order::class,'order_product','products_id','orders_id') -> withTimestamps();
    }*/
}
