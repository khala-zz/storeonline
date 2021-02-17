<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// su dung trait
use App\Traits\DeleteModelTrait;
use App\Models\Permission;
use App\Components\PermissionRecusive;

class AdminPermissionController extends Controller
{
    use DeleteModelTrait;
    private $permission;
    private $permissionRecusive;

    public function __construct(Permission $permission,PermissionRecusive $permissionRecusive)
    {
     	$this -> permissionRecusive = $permissionRecusive;
        $this -> permission = $permission;
    }
    
    //liet ke permission
    public function index()
    {
        $permissions = $this -> permission -> latest() -> paginate(25);
        return view('admin.permission.index',compact('permissions'));
    }
    //create permisions
    public function addPermissions(){
        $htmlOption = $this -> permissionRecusive -> permissionRecusiveAdd();
       //cai cu
       //return view('admin.permission.add_1');
        return view('admin.permission.add',compact('htmlOption'));
    }

    public function storePermissions(Request $request){
    	//cai cu
        /*$permission = $this -> permission -> create([
    		'name' => $request -> module_parent,
    		'display_name' => $request -> module_parent,
    		'parent_id' => 0
    	]);

    	foreach($request -> module_children as $value){
    		$permission -> create([
    			'name' => $value,
    			'display_name' => $value,
    			'parent_id' => $permission -> id,
    			'key_code' => $request -> module_parent.'_'.$value
    		]);
    	}*/
        //dd($request -> all());
        if($request -> parent_id == 0)
        {
            $key_code = null;
        }
        else 
        {
            $name = $this -> permission -> select('name') -> where('id',$request -> parent_id) -> get();
            
            $key_code =  $name['0'] -> name .'_'.$request -> name;   
        }
        dd('test');
        $this -> permission -> create([
            'name' => $request -> name,
            'parent_id' => $request -> parent_id,
            'display_name' => $request -> name,
            'key_code' => $key_code
           
        ]);

    	return redirect() -> route('permission.index') -> with('success','Thêm permission thành công');
    }

    //chinh sua permission
    public function edit($id)
    {
        
        $permission = $this -> permission -> find($id);

        $htmlOption = $this -> permissionRecusive -> permissionRecusiveEdit($permission -> parent_id);

        return view('admin.permission.edit',compact('permission','htmlOption'));
    }

    public function update($id,Request $request)
    {
        if($request -> parent_id == 0)
        {
            $key_code = null;
        }
        else 
        {
            $name = $this -> permission -> select('name') -> where('id',$request -> parent_id) -> get();
            
            $key_code =  $name['0'] -> name .'_'.$request -> name;   
        }

        $this -> permission -> find($id) -> update([
            'name' => $request -> name,
            'parent_id' => $request -> parent_id,
            'display_name' => $request -> name,
            'key_code' => $key_code
        ]);

        return redirect() -> route('permission.index') -> with('success','Cập nhật thành công');
    }
    //xoa permission
    public function delete($id)
    {
        return $this -> deleteModelTrait($id, $this -> permission);
    }
}
