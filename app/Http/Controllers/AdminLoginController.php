<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{
    public function loginAdmin()
    {
    	if(Auth::check())
    	{
    		return redirect() -> to('admin/brands');
    	}
    	return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
    	
    	
        $remember = $request -> has('remember_me') ? true : false;
       
    	if(Auth::attempt(['email' => $request -> email,'password' => $request -> password],$remember))
    	{
    		
            return redirect() -> to('admin/brands'); 
    	}
    }
    // dăng xuất
    public function logoutAdmin(){
        Auth::logout();
        
        return redirect('/admin/login');
    }
}
