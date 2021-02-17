<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\Session;

use App\Models\Coupon;

class AdminCouponController extends Controller
{
    use DeleteModelTrait;
    private $coupon;

    public function __construct(Coupon $coupon)
    {
    	$this -> coupon = $coupon;
    }
    
    //liet ke coupon
    public function index()
    {
    	$coupons = $this -> coupon -> latest() -> paginate(5);
    	return view('admin.coupon.index',compact('coupons'));
    }

    //them coupon
    public function add()
    {
    	return view('admin.coupon.add');
    }

    //store
    public function store(Request $request)
    {
    	
    	$this -> coupon -> create([
    		'coupon_code' => $request -> coupon_code,
    		'amount' => $request -> amount,
    		'amount_type' => $request -> amount_type,
    		'expiry_date' => $request -> expiry_date,
    		'status' => $request -> status
    	]);

    	return redirect() -> route('coupon.index') -> with('success','Thêm coupon thành công');
    }

    //chinh sửa
    public function edit($id)
    {
    	$coupon = $this -> coupon -> find($id);
    	return view('admin.coupon.edit',compact('coupon'));
    }

    //update
    public function update($id, Request $request)
    {
    	$this -> coupon -> find($id) -> update([
    		'coupon_code' => $request -> coupon_code,
    		'amount' => $request -> amount,
    		'amount_type' => $request -> amount_type,
    		'expiry_date' => $request -> expiry_date,
    		'status' => $request -> status
    	]);

    	return redirect() -> route('coupon.index') -> with('success','Cập nhật coupon thành công');
    }

    //xoa coupon
    public function delete($id)
    {
    	return $this -> deleteModelTrait($id,$this -> coupon);
    }

    //apply coupon frontend
    public function applyCoupon(Request $request){
        $this->validate($request,[
            'coupon_code'=>'required'
        ]);

        $input_data=$request->all();
        //get coupon code
        $coupon_code=$input_data['coupon_code'];
        $total_amount_price=$input_data['Total_amountPrice'];
        $check_coupon=Coupon::where('coupon_code',$coupon_code)->count();
        if($check_coupon==0){
            return back()->with('message_coupon','Your Coupon Code Not Exist!');
        }else if($check_coupon==1){
            $check_status=Coupon::where('status',1)->first();
            if($check_status->status==0){
                return back()->with('message_coupon','Your Coupon was Disabled!');
            }else{
                $expiried_date=$check_status->expiry_date;
                $date_now=date('Y-m-d');
                if($expiried_date<$date_now){
                    return back()->with('message_coupon','Your Coupon was Expired!');
                }else{
                    $discount_amount_price=($total_amount_price*$check_status->amount)/100;
                    Session::put('discount_amount_price',$discount_amount_price);
                    Session::put('coupon_code',$check_status->coupon_code);
                    return back()->with('message_apply_sucess','Your Coupon Code was Apply');
                }
            }
        }
    }

}
