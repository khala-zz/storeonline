<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
    	$categorysLimit = Category::where('parent_id',0) -> get();
    	$categorys = Category::where('parent_id',0) -> get();
    	return view('frontend.user.login_page',compact('categorys','categorysLimit'));
    }
    //dang kí
    public function register(Request $request)
    {
    	$this->validate($request,[
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $input_data=$request->all();
        $input_data['password']=Hash::make($input_data['password']);
        User::create($input_data);
        return back()->with('message','Đăng kí thành công!');
    }

    //dang nhap
    public function login(Request $request){
        $input_data=$request->all();
        if(Auth::attempt(['email'=>$input_data['email'],'password'=>$input_data['password']])){
            Session::put('frontSession',$input_data['email']);
            return redirect('/view-cart');
        }else{
            return back()->with('message','Account is not Valid!');
        }
    }

    // dăng xuất
    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        return redirect('/');
    }

    //my account
    public function myAccount(){
    	
        $categorysLimit = Category::where('parent_id',0) -> get();
    	$categorys = Category::where('parent_id',0) -> get();
        $countries=DB::table('countries')->get();
        $user_login=User::where('id',Auth::id())->first();
        return view('frontend.user.account',compact('countries','user_login','categorysLimit','categorys'));
    }
    //cap nhat thong tin tai khoan
    public function updateProfile(Request $request,$id){
    	
        $this->validate($request,[
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'mobile'=>'required',
        ]);
        $input_data=$request->all();
        DB::table('users')->where('id',$id)->update([
        	'name'=>$input_data['name'],
            'address'=>$input_data['address'],
            'city'=>$input_data['city'],
            'state'=>$input_data['state'],
            'country'=>$input_data['country'],
            'pincode'=>$input_data['pincode'],
            'mobile'=>$input_data['mobile']]);
        return back()->with('message','Cập nhật thông tin tài khoản thành công!');

    }

    // cập nhật mật khẩu
    public function updatePassword(Request $request,$id){
        $oldPassword=User::where('id',$id)->first();
        $input_data=$request->all();
        if(Hash::check($input_data['password'],$oldPassword->password)){
            $this->validate($request,[
               'newPassword'=>'required|min:6|max:12|confirmed'
            ]);
            $new_pass=Hash::make($input_data['newPassword']);
            User::where('id',$id)->update(['password'=>$new_pass]);
            return back()->with('message','Update Password Already!');
        }else{
            return back()->with('oldpassword','Old Password is Inconrrect!');
        }
    }
    
}
