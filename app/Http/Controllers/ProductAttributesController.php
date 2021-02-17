<?php

namespace App\Http\Controllers;

use Log;

use Illuminate\Http\Request;
// su dung trait
use App\Traits\DeleteModelTrait;

use App\Models\Product;
use App\Models\ProductAttribute;

class ProductAttributesController extends Controller
{
    use DeleteModelTrait;

    private $product;
    private $productAttr;

    public function __construct(Product $product, ProductAttribute $productAttr)
    {
    	$this -> product = $product;
    	$this -> productAttr = $productAttr;
    }

    public function add($id)
    {
    	$product = $this -> product -> findOrFail($id);
    	$productAttrs = $this -> productAttr -> where('product_id',$id) -> get();
    	return view('admin.product.add-attr',compact('product','productAttrs'));
    }

    public function store(Request $request)
    {
    	$product = $this -> product -> findOrFail($request -> product_id);
    	$product -> attributes() -> create([
    		'sku' => $request -> sku,
    		'size' => $request -> size,
    		'price' => $request -> price,
    		'stock' => $request -> stock
    	]);

    	return back()->with('success','Thêm thuộc tính thành công');

    }

    //cap nhat attribute
    public function update(Request $request)
    {
    	$id = $request -> editid;
    	$sku = $request -> sku;
    	$size = $request -> size;
    	$price = $request -> price;
    	$stock = $request -> stock;
    	try 
        {

           $this -> productAttr -> find($id) ->update([
           	'sku' => $sku,
           	'size' => $size,
           	'price' => $price,
           	'stock' => $stock
           ]);
           return response() -> json([
             'code' => 200,
             'message' => 'success'
            ],200);

    	}
    	catch(\Exception $exception){
    		
    		Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());
    		return response() -> json([
    			'code' => 500,
    			'message' => 'fail'
    		],500);

    	}
        //return back()->with('message','Update Attribute Successed');
    }

    //xoa attribute
    public function delete($id)
    {
    	return $this -> deleteModelTrait($id,$this -> productAttr);
    }
}
