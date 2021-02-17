<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// su dung request rieng de check validate
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Str;

// su dung trait
use App\Traits\DeleteModelTrait;

use App\Components\MenuRecusive;
use App\Models\Menu;

class MenuController extends Controller
{
    use DeleteModelTrait;
    private $menuRecusive;
    private $menu;

    public function __construct(MenuRecusive $menuRecusive, Menu $menu){
    	$this -> menuRecusive = $menuRecusive;
    	$this -> menu = $menu;
    }

    //them menu
   	public function create(){
    	$htmlOption = $this -> menuRecusive -> menuRecusiveAdd();
    	return view('admin.menu.add',compact('htmlOption'));
    }

    public function store(MenuRequest $request)
    {
    	$this -> menu -> create([
    		'name' => $request -> name,
    		'parent_id' => $request -> parent_id,
    		'slug' => Str::slug($request -> name),
    		'status' => $request -> status
    	]);

    	return redirect() -> route('menu.index') -> with('success','Thêm mới menu thành công');
    }

    //liet ke danh sach menu

    public function index()
    {
    	$menus = $this -> menu -> latest() -> paginate('5');
    	return view('admin.menu.index',compact('menus'));
    }
    //cap nhat menu
    public function edit($id)
    {
    	$menu = $this -> menu -> find($id);

    	$htmlOption = $this -> menuRecusive -> menuRecusiveEdit($menu -> parent_id);

    	return view('admin.menu.edit',compact('menu','htmlOption')); 
    }

    public function update($id,MenuRequest $request)
    {
    	$this -> menu -> find($id) -> update([
    		'name' => $request -> name,
    		'parent_id' => $request -> parent_id,
    		'slug' => Str::slug($request -> name),
    		'status' => $request -> status
    	]);

    	return redirect() -> route('menu.index') -> with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
    	return $this -> deleteModelTrait($id, $this -> menu);
    }
}
