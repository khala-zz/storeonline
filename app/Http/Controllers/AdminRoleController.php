<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Permission;
use App\Models\Role;

// su dung trait
use App\Traits\DeleteModelTrait;

class AdminRoleController extends Controller
{
    private $permission;
    private $role;
    use DeleteModelTrait;

    public function __construct(Permission $permission, Role $role)
    {
    	$this -> permission = $permission;
    	$this -> role = $role;
    }

    //liet ke role
    public function index()
    {
    	$roles = $this -> role -> latest() -> paginate(5);
    	return view('admin.role.index',compact('roles'));
    }

    public function add()
    {
    	$permissionsParent = $this -> permission -> where('parent_id',0) -> get();
    	return view('admin.role.add',compact('permissionsParent'));
    }

    public function store(Request $request)
    {
    	
        $role = $this -> role -> create([
    		'name' => $request -> name,
    		'display_name' => $request -> display_name,
    		'description' => $request -> description,
    		'status' => $request -> status
    	]);
        dd('test2');
    	//relationship in model 
    	$role -> permissions() -> attach($request -> permission_id);

    	return redirect() -> route('role.index') -> with('success','Thêm role thành công');
    }

    //chỉnh sửa role

    public function edit($id)
    {
    	$permissionsParent = $this -> permission -> where('parent_id',0) -> get();
    	$role = $this -> role -> find($id);
    	$permissionsChecked = $role -> permissions;
    	return view('admin.role.edit',compact('role','permissionsChecked','permissionsParent'));
    }

    //update
    public function update(Request $request, $id){
    	$role = $this -> role -> find($id);
    	$role ->  update([
    		'name' => $request -> name,
    		'display_name' => $request -> display_name,
    		'description' => $request -> description,
    		'status' => $request -> status
    	]);

    	$role -> permissions() -> sync($request -> permission_id);

    	return redirect() -> route('role.index') -> with('success','Cập nhật thành công');
    }
    //xóa role
    public function delete($id)
    {

    	return $this -> deleteModelRoleTrait($id, $this -> role);
    }
}
