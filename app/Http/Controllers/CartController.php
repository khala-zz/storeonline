<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductAttribute;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index(){
    	$categorysLimit = Category::where('parent_id',0) -> get();
    	$categorys = Category::where('parent_id',0) -> get();
        $session_id=Session::get('session_id');
        $cart_datas=Cart::where('session_id',$session_id)->get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        return view('frontend.cart.cart',compact('cart_datas','total_price','categorysLimit','categorys'));
    }

    public function addToCart(Request $request)
    {
    	
        $inputToCart=$request->all();
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        if($inputToCart['size']==""){
            return back()->with('message','Please select Size');
        }else{
            $stockAvailable=DB::table('product_attributes')->select('stock','sku')->where(['product_id'=>$inputToCart['product_id'],
                'price'=>$inputToCart['price']])->first();
           //dd($inputToCart['size']);
            //kiem tra neu trong kho het hang hay khong?
            if($stockAvailable -> stock >= $inputToCart['quantity']){
                $inputToCart['user_email']='weshare@gmail.com';
                $session_id=Session::get('session_id');

                if(empty($session_id)){
                    $session_id=Str::random(40);
                    Session::put('session_id',$session_id);
                }

                $inputToCart['session_id']=$session_id;

                $sizeAtrr=explode("-",$inputToCart['size']);
                $inputToCart['size']=$sizeAtrr[1];
                $inputToCart['product_code']=$stockAvailable->sku;
                //khong che chay tren host heroku
                $inputToCart['product_color']='red';
                //kiem tra trong gio hang co mua chua?
                $count_duplicateItems=Cart::where(['product_id'=>$inputToCart['product_id'],
                    'product_color'=>$inputToCart['product_color'],
                    'size'=>$inputToCart['size']])->count();
                if($count_duplicateItems>0){
                    return back()->with('message','sản phẩm thêm vào giỏ hàng thành công');
                }else{
                   
                    Cart::create($inputToCart);
                   //gan session de hien thi so luong san pham ra ben ngoai gio hang
                    $sessionCountItemCart = Cart::all() -> count();
                    $request->session()->put('count_item_cart', $sessionCountItemCart);
                    
                    return back()->with('message','Sản phẩm đã được thêm vào gio hang');
                }
            }
            else
            {
                return back()->with('message','Stock is not Available!');
            }
        }
    }
    //add to cart button ajax
    public function addToCartAjax(Request $request)
    {
    	$inputToCart = [];
        $inputToCart['product_id'] = $request -> product_id;
    	$inputToCart['size']  = $request -> size;
        $inputToCart['price'] = $request -> price;
        $inputToCart['quantity'] = 1;
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        die($inputToCart);
        try 
        {

           if($inputToCart['size']==""){
            return back()->with('message','Please select Size');
            }
            else{
                    $stockAvailable=DB::table('product_attributes')->select('stock','sku')->where(['product_id'=>$inputToCart['product_id'],
                        'price'=>$inputToCart['price']])->first();
                   //dd($inputToCart['size']);
                    //kiem tra neu trong kho het hang hay khong?
                    if($stockAvailable -> stock >=  $inputToCart['quantity']){
                        $inputToCart['user_email']='weshare@gmail.com';
                        $session_id=Session::get('session_id');

                        if(empty($session_id)){
                            $session_id=Str::random(40);
                            Session::put('session_id',$session_id);
                        }

                        $inputToCart['session_id']=$session_id;

                        $sizeAtrr=explode("-",$inputToCart['size']);
                        $inputToCart['size']=$sizeAtrr[1];
                        $inputToCart['product_code']=$stockAvailable->sku;
                        //khong che chay tren host heroku
                        $inputToCart['product_color']='red';
                        //kiem tra trong gio hang co mua chua?
                        $count_duplicateItems=Cart::where(['product_id'=>$inputToCart['product_id'],
                            'product_color'=>$inputToCart['product_color'],
                            'size'=>$inputToCart['size']])->count();
                        if($count_duplicateItems>0){
                            return back()->with('message','sản phẩm thêm vào giỏ hàng thành công');
                        }else{
                            
                            Cart::create($inputToCart);
                           //gan session de hien thi so luong san pham ra ben ngoai gio hang
                            $sessionCountItemCart = Cart::all() -> count();
                            $request->session()->put('count_item_cart', $sessionCountItemCart);

                            $response = 'Sản phẩm đã được thêm vào gio hang';
                        }
                    }
                    else
                    {
                        $response = 'Het hang!';
                    }
                }
           return response() -> json([
             'code' => 200,
             'message' => 'thanh cong'
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
    
    public function deleteItem($id=null){
    	
        $delete_item=Cart::findOrFail($id);
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $delete_item->delete();
        return back()->with('message','Deleted Success!');
    }
    //cap nhat gio hang
    public function updateQuantity($id,$quantity){
        //dd('update');
        Session::forget('discount_amount_price');
        Session::forget('coupon_code');
        $sku_size=DB::table('carts')->select('product_code','size','quantity')->where('id',$id)->first();
        $stockAvailable=DB::table('product_attributes')->select('stock')->where(['sku'=>$sku_size->product_code,
            'size'=>$sku_size->size])->first();
        $updated_quantity=$sku_size->quantity+$quantity;
        if($stockAvailable->stock>=$updated_quantity){
            DB::table('carts')->where('id',$id)->increment('quantity',$quantity);
            return back()->with('message','Cập nhật số lượng thành công');
        }else{
            return back()->with('message','Kho ko đủ hàng!');
        }


    }
}
