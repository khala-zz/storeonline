<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// su dung trait
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;

use App\Models\Product;
use App\Models\ProductImage;

class ImageGalleryController extends Controller
{
    // su dung trait trong app/traits/
	use StorageImageTrait;
	use DeleteModelTrait;
    private $product;
    private $product_images;

    public function __construct(Product $product, ProductImage $product_images)
    {
    	$this -> product = $product;
    	$this -> product_images = $product_images;
    }

    public function add($product_id)
    {
    	$product = $this -> product -> findOrFail($product_id);
    	$imagesGallery = $this -> product_images -> where('product_id',$product_id) -> get();
    	return view('admin.product.add-gallery-image',compact('product','imagesGallery'));
    }

    public function store(Request $request)
    {
        $product = $this -> product -> findOrFail($request -> products_id);
        //kiem tra co anh chi tiet('image_path') thi inser vao table ProductImage
    		if($request -> hasFile('image_path')){
    			foreach($request -> image_path as $fileItem){

    				//goi multiupload file
    				$dataImageUploadMulti = $this -> storageImageUploadMultiple($fileItem,'product');
    				//insert vao table productimages bang cach goi function images() trong model
    				$product -> images() -> create([
    					'image_path' => $dataImageUploadMulti['file_path'],
    					'image_name' => $dataImageUploadMulti['file_name'],
    					'name' => $dataImageUploadMulti['name']
    				]);

    			}
    		}
        return back()->with('message','Add Images Successed');
    }

    //xoa image
    public function delete($id)
    {
    	
    	return $this -> deleteModelProductTrait($id, $this -> product_images);
    }

}
