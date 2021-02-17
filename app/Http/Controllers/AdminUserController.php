<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Role;

// su dung trait
use App\Traits\DeleteModelTrait;

class AdminUserController extends Controller
{
    use DeleteModelTrait;

    private $user;
    private $role;

    public function __construct(User $user, Role $role)
    {
    	$this -> user = $user;
    	$this -> role = $role;
    }

    //liet ke user
    public function index()
    {
    	$users = $this -> user -> latest() -> paginate(5);
    	
    	return view('admin.user.index',compact('users'));
    }

    //add
    public function add()
    {
    	$roles = $this -> role -> all();
    	return view('admin.user.add',compact('roles'));
    }

    public function store(Request $request)
    {
    	try
    	{
    		DB::beginTransaction();

    		$user = $this -> user -> create([
    			'name' => $request -> name,
    			'email' => $request -> email,
    			'password' => Hash::make($request -> password),
    			'status' => $request -> status

    		]);
    		$user -> roles() -> attach($request -> role_id);
    		DB::commit();
    		return redirect() -> route('user.index') -> with('success','Thêm user thành công');
    	}
    	catch(Exception $excepction)
    	{
    		DB::rollback();
    		Log::error('Message: '.$exception -> getMessage().'----Line: '.$exception -> getLine());
    	}
    	
    }

    //chinh sưa user
    public function edit($id)
    {
        $user = $this -> user -> find($id);
        $roles = $this -> role -> all();
        $roleOfUser = $user -> roles;
        return view('admin.user.edit',compact('user','roles','roleOfUser'));
    }

    public function update($id, Request $request)
    {
        //dd($request -> status);
        try
        {
            DB::beginTransaction();
            //dd($request -> status);
            $this -> user -> find($id) -> update([
                'name' => $request -> name,
                'email' => $request -> email,
                'status' => $request -> status,
                'password' => Hash::make($request -> password)
                
            ]);
            $user = $this -> user -> find($id);
            $user -> roles() -> sync($request -> role_id);
            DB::commit();
            return redirect() -> route('user.index') -> with('success','Sửa user thành công');
        }
        catch(Exception $excepction)
        {
            DB::rollback();
            Log::error('Message: '.$exception -> getMessage().'----Line: '.$exception -> getLine());
        }
    }

    //xoa user
    public function delete($id)
    {
        return $this -> deleteModelUserRoleTrait($id, $this -> user);
    }
}
