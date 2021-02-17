<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductAttribute;

class FrontCategoryController extends Controller
{
    
    public function index($slug,$CategoryId)
    {
    	$categorysLimit = Category::where('parent_id',0)  -> get();
    	$products = Product::where('category_id',$CategoryId) -> paginate(5);
    	$categorys = Category::where('parent_id',0) -> get();
        
    	return view('frontend.product.category.list',compact('categorysLimit','products','categorys'));
    }

    public function productDetail($slug,$id)
    {
    	
    	$categorysLimit = Category::where('parent_id',0) -> get();
    	$detail_product=Product::findOrFail($id);
    	$categorys = Category::where('parent_id',0) -> get();
        $imagesGalleries=ProductImage::where('product_id',$id)->get();
        $totalStock=ProductAttribute::where('product_id',$id)->sum('stock');
        $productRecommend=Product::where([['id','!=',$id],['category_id',$detail_product->category_id]])->get();

        return view('frontend.product.detail',compact('detail_product','imagesGalleries','totalStock','productRecommend','categorys','categorysLimit'));
    }

    //get Attrs 
    public function getAttrs(Request $request){
        $all_attrs=$request->all();

        //print_r($all_attrs);die();
        $attr=explode('-',$all_attrs['size']);
        //echo $attr[0].' <=> '. $attr[1];die();
        $result_select=ProductAttribute::where(['product_id'=>$attr[0],'size'=>$attr[1]])->first();
        echo $result_select->price."#".$result_select->stock;
    }
}
