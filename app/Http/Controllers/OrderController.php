<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(){
        $session_id=Session::get('session_id');
        $cart_datas=Cart::where('session_id',$session_id)->get();
        $categorysLimit = Category::where('parent_id',0) -> get();
    	$categorys = Category::where('parent_id',0) -> get();
        $total_price=0;
        foreach ($cart_datas as $cart_data){
            $total_price+=$cart_data->price*$cart_data->quantity;
        }
        $shipping_address=DB::table('delivery_address')->where('users_id',Auth::id())->first();
        return view('frontend.checkout.review_order',compact('shipping_address','cart_datas','total_price','categorysLimit','categorys'));
    }
    
    public function order(Request $request){
        $input_data=$request->all();
        $input_data['ma_order'] = 'KL-'.Str::random(10);
        $payment_method=$input_data['payment_method'];
        $order = Order::create($input_data);
        $cart_content = Cart::all();

        foreach($cart_content as $cData)
        {
            $order -> orderProducts() -> attach($cData -> product_id,[
                'total' => $cData -> quantity * $cData -> price,
                'price' => $cData -> price,
                'size' => $cData -> size,
                'qty' => $cData -> quantity
            ]);
        }
        //xoa itme cart
        Cart::truncate();
        //xoa session tren icon gio hang de tro lai 0 khi oreder thanh cong
        Session::forget('count_item_cart');
        if($payment_method=="COD"){
            return redirect('/cod');
        }else{
            return redirect('/paypal');
        }
    }
    public function cod()
    {
    	$categorysLimit = Category::where('parent_id',0) -> get();
    	$categorys = Category::where('parent_id',0) -> get();
        $user_order=Order::where('user_id',Auth::id())->first();
        return view('frontend.payment.cod',compact('user_order','categorys','categorysLimit'));
    }
    public function paypal(Request $request){
    	
        $categorysLimit = Category::where('parent_id',0) -> get();
    	$categorys = Category::where('parent_id',0) -> get();
        $who_buying=Order::where('user_id',Auth::id())->first();
        return view('frontend.payment.paypal',compact('who_buying','categorysLimit','categorys'));
    }
}
