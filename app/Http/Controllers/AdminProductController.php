<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductAddRequest;

use Illuminate\Support\Str;
// su dung trait
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
//ham de quy
use App\Components\Recusive;
use App\Components\BrandRecusive;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Tag;
use App\Models\Brand;
use App\Models\ProductTag;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminProductController extends Controller
{
    // su dung trait trong app/traits/
	use StorageImageTrait;
	use DeleteModelTrait;

    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    private $brand;

    public function __construct(Category $category,Product $product,ProductImage $productImage,Tag $tag,ProductTag $productTag,Brand $brand)
    {
    	$this -> category = $category;
    	$this -> product = $product;
    	$this -> productImage = $productImage;
    	$this -> tag = $tag;
    	$this -> productTag = $productTag;
        $this -> brand = $brand;
    }
    //get toan bo danh muc
    public function getCategory($parentId){
		$data = $this -> category -> all();
    	$recusive = new Recusive($data);
    	$htmlOption = $recusive -> categoryRecusive($parentId);
    	return $htmlOption;
	}

      //get toan bo brand
    public function getBrandAdd($parentId){
	    
        $data = $this -> brand -> all();
	  
        $recusive = new BrandRecusive($data);
        $htmlOption = $recusive -> brandRecusiveAdd($parentId);
	   
        return $htmlOption;
    }
      //edit brand  
    public function getBrandEdit($parentId){
        $data = $this -> brand -> all();
        $recusive = new BrandRecusive($data);
        $htmlOption = $recusive -> brandRecusiveEdit($parentId);
        return $htmlOption;
    }

    public function index(Request $request)
    {
    	$products = $this -> product -> 
        when($request -> get('query') != '',function($query) use ($request){

            $query -> where('name','like', '%'.$request -> get('query').'%');
        })
        -> when($request -> get('category_search',0) > 0,function($query) use ($request){
            //category la model
            $query -> whereHas('category',function($q) use ($request){$q -> where('id',$request -> category_search);} );
        })
        -> when($request -> get('tag_search',0) > 0,function($query) use ($request){

            $query -> whereHas('tags',function($q) use ($request){$q -> where('tag_id',$request -> tag_search);} );
        })  

        -> latest() -> paginate(5);
        $categories = $this -> category -> all();
        $tags = $this -> tag ->all();
    	return view('admin.product.index',compact('products','categories','tags'));

    }

    //them product

    public function add()
    {
    	
	$htmlOption = $this -> getCategory($parentId = '');
	    
        $htmlOptionBrand = $this -> getBrandAdd($parentId = 0);
	 
    	return view('admin.product.add',compact('htmlOption','htmlOptionBrand'));
    }

    public function store(Request $request)
    {
    	
	    try
    	{
    		DB::beginTransaction();
    		$dataProductCreate = [
    			'name' => $request -> name,
                'ma_sp' => $request -> ma_sp,
                'slug' => Str::slug($request -> name),
    			'price' => $request -> price,
    			'description' => $request -> description,
    			'content' => $request -> content,
    			'user_id' => Auth::id(),
    			'category_id' => $request -> category_id,
                'brand_id' => $request -> brand_id,
    			'status' => $request -> status

    		];
		    
    		$dataFeatureImage = $this -> storageImageUpload($request,'feature_image_path','product');
    		if(!empty($dataFeatureImage))
    		{
    			$dataProductCreate['feature_image_path'] = $dataFeatureImage['file_path'];
    			$dataProductCreate['feature_image_name'] = $dataFeatureImage['file_name'];
    		}
		    
    		//them vao bang product
    		$product = $this -> product -> create($dataProductCreate);
    		//kiem tra co tags thi insert vao bang tags
    		$tagIds = [];
    		if(!empty($request -> tags))
	        {
	          foreach ($request -> tags as $tagItem) {
	    		//insert to table tags
	              $tagInstance = $this -> tag -> firstOrCreate(['name' => $tagItem]);
	              $tagIds[] = $tagInstance -> id;
	          }
	        }
		    dd('store tag');
    		//trong Product model lam reletionship belongtomany function tags() de insert du lieu vao bang trung gian
    		$product -> tags() -> attach($tagIds);

    		//insert toan ven du lieu
    		DB::commit();
    		return redirect() -> route('product.index') -> with('success','Thêm sản phẩm thành công');

    	}
    	catch(Exception $exception)
    	{
    		DB::rollBack();
    		Log::error('Lỗi: '. $exception -> getMessage().'------ Dòng:' . $exception -> getLine());
    	}
    }

    //chinh sua san pham
    public function edit($id)
    {
        $product = $this -> product -> findOrFail($id);
        $htmlOption = $this -> getCategory($product -> category_id);
        $htmlOptionBrand = $this -> getBrandEdit($product -> brand_id);
        return view('admin.product.edit',compact('product','htmlOption','htmlOptionBrand'));
    }
    public function update(Request $request,$id){
        try{
            DB::beginTransaction();
            $dataProductUpdate = [
            'name' => $request -> name,
            'ma_sp' => $request -> ma_sp,
            'slug' => Str::slug($request -> name),
            'price' => $request -> price,
            'description' => $request -> description,
            'content' => $request -> content,
            'user_id' => Auth::id(),
            'category_id' => $request -> category_id,
            'brand_id' => $request -> brand_id,
            'status' => $request -> status
        ];
        $dataUploadFeatureImage = $this -> storageImageUpload($request,'feature_image_path','product');
        if(!empty($dataUploadFeatureImage)){
            $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
        }
        $this -> product -> find($id) ->update($dataProductUpdate);
        //sau khi cap nhat xong bang product phai tim lai gia bang ghi(instance) de cho truy van sau ko bi loi vi cap nhat chi tra ve true hoac false
        $product = $this -> product -> find($id);

        //insert tags for product
        $tagIds = [];
        if(!empty($request -> tags))
        {
          foreach ($request -> tags as $tagItem) {
            //insert to table tags
              $tagInstance = $this -> tag -> firstOrCreate(['name' => $tagItem]);
              $tagIds[] = $tagInstance -> id;
          }
            
        }
        //trong Product model lam reletionship belongtomany function tags()
        //dung sync de dong bo,cai nao co rui thi ko cap nhat vao table
        $product -> tags() -> sync($tagIds);
        
        DB::commit();
        return redirect() -> route('product.index')-> with('success','Cập nhật sản phẩm thành công');

        }
        catch(\Exception $exception){
            DB::rollBack();
            \Log::error('Message:'. $exception -> getMessage(). 'Line:'.$exception -> getLine());

        }
    }

    //xoa san pham
    public function delete($id)
    {
        return $this -> deleteModelTrait($id,$this -> product);
    }
}
