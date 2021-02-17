<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Traits\DeleteModelTrait;

//goi model
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

class AdminOrderController extends Controller
{
    use DeleteModelTrait;
    private $order;
    private $order_product;
    private $product;

    public function __construct(Order $order,OrderProduct $order_product,Product $product)
    {
    	$this -> order = $order;
    	$this -> order_product = $order_product;
    	$this -> product = $product;
    }

    //liet ke order
    public function index()
    {
    	
    	$orders = $this -> order -> latest() -> paginate(10);
    	return view('admin.order.index',compact('orders'));
    }

    public function edit($id)
    {
    	$order = $this -> order -> findOrFail($id);
    	//$products = DB::table('order_product') -> where('orders_id',$id) -> get();
    	$products = $this -> order_product -> where('orders_id',$id) -> get();

    	$product_model = $this -> product;
    	
    	//dd($products);
    	return view('admin.order.edit',compact('order','products','product_model'));
    }

     public function updateNote(Request $request)
    {
    	$id = $request -> note_order_id;
    	$note = $request -> note;
    	try 
        {

           $this -> order -> find($id) ->update([
           	'note' => $note
           	
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
    // cap nhat trang thai don hang
    public function updateConfirm(Request $request)
    {
    	$id = $request -> confirm_order_id;
    	$confirm = $request -> confirm;
    	try 
        {

           $this -> order -> find($id) ->update([
           	'order_status' => $confirm
           	
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

    public function updatePayment(Request $request)
    {
    	$id = $request -> payment_order_id;
    	$payment = $request -> payment;
    	try 
        {

           $this -> order -> find($id) ->update([
           	'payment_status' => $payment
           	
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
}
