<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

// su dung trait
use App\Traits\DeleteModelTrait;

use App\Components\BrandRecusive;
use App\Models\Brand;

class AdminBrandController extends Controller
{
    use DeleteModelTrait;
    private $brandRecusive;
    private $brand;

    public function __construct(BrandRecusive $brandRecusive, Brand $brand){
    	$this -> brandRecusive = $brandRecusive;
    	$this -> brand = $brand;
    }

    //them brand
   	public function create(){
    	$htmlOption = $this -> brandRecusive -> brandRecusiveAdd();
    	return view('admin.brand.add',compact('htmlOption'));
    }

    public function store(Request $request)
    {
    	$this -> brand -> create([
    		'name' => $request -> name,
    		'parent_id' => $request -> parent_id,
    		'slug' => Str::slug($request -> name),
    		'status' => $request -> status
    	]);

    	return redirect() -> route('brand.index') -> with('success','Thêm mới brand thành công');
    }

    //liet ke danh sach brand

    public function index()
    {
    	$brands = $this -> brand -> latest() -> paginate('5');
    	return view('admin.brand.index',compact('brands'));
    }
    //cap nhat brand
    public function edit($id)
    {
    	$brand = $this -> brand -> find($id);

    	$htmlOption = $this -> brandRecusive -> brandRecusiveEdit($brand -> parent_id);

    	return view('admin.brand.edit',compact('brand','htmlOption')); 
    }

    public function update($id,Request $request)
    {
    	$this -> brand -> find($id) -> update([
    		'name' => $request -> name,
    		'parent_id' => $request -> parent_id,
    		'slug' => Str::slug($request -> name),
    		'status' => $request -> status
    	]);

    	return redirect() -> route('brand.index') -> with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
    	return $this -> deleteModelTrait($id, $this -> brand);
    }
}
