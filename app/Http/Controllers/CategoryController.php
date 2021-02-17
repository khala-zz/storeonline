<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
// su dung request rieng de check validate
use App\Http\Requests\CategoryRequest;
//su dung de quy
use App\Components\Recusive;
// su dung trait
use App\Traits\DeleteModelTrait;
//goi model

use App\Models\Category;

class CategoryController extends Controller
{
    use DeleteModelTrait;
    private $category;

    public function __construct(Category $category)
    {
    	$this -> category = $category;
    }

    public function getCategory($parentId)
    {
    	$data = $this -> category -> all();

    	$recusive = new Recusive($data);

    	$htmlOption = $recusive -> categoryRecusive($parentId);

    	return $htmlOption;

    }
    
    public function index()
    {
    	$categories = $this -> category -> latest() -> paginate(5);
    	
    	return view('admin.category.index',compact('categories'));
    }
    
    public function create()
    {
    	$htmlOption = $this -> getCategory($parentId = '');
    	return view('admin.category.add', compact('htmlOption'));
    }

    public function store(CategoryRequest $request)
    {
    	$this -> category -> create([
    		'name' => $request -> name,
    		'parent_id' => $request -> parent_id,
    		'slug' => Str::slug($request -> name),
    		'status' => $request -> status
    	]);

    	return redirect() -> route('categories.index') -> with('message','Thêm mới thành công');

    }

    public function edit($id)
    {
    	$category = $this -> category -> find($id);
    	$htmlOption = $this -> getCategory($category -> parent_id);
    	return view('admin.category.edit',compact('category','htmlOption'));
    }
    public function update($id, CategoryRequest $request)
    {
    	$this -> category -> find($id) -> update([
    		'name' => $request -> name,
    		'parent_id' => $request -> parent_id,
    		'slug' => Str::slug($request -> name),
    		'status' => $request -> status
    	]);
    	return redirect() -> route('categories.index') -> with('message','Cập nhật thành công');
    }
    // xoa danh muc
    public function delete($id)
    {
    	return $this -> deleteModelTrait($id, $this -> category);
    }
}
