<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
// su dung trait
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;

//modle

use App\Models\Slider;

class SliderController extends Controller
{
    use StorageImageTrait;
    use DeleteModelTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
    	$this -> slider = $slider;
    }

    //liet ke slider
    public function index()
    {
    	$sliders = $this -> slider -> latest() -> paginate(5);
    	return view('admin.slider.index',compact('sliders'));
    }

    //them slider
    public function add()
    {
    	return view('admin.slider.add');
    }

    public function store(Request $request)
    {
    	try
    	{
    		$dataInsert = [
    			'name' => $request -> name,
    			'description' => $request -> description,
    			'content' => $request -> content,
    			'status' => $request -> status
    		];
    		//goi trail upload image
    		$dataImageSlider = $this -> storageImageUpload($request,'image_path','slider');

    		if(!empty($dataImageSlider)){
    			$dataInsert['image_path'] = $dataImageSlider['file_path'];
    			$dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['baseimage'] = $dataImageSlider['baseimage'];
    		}
    		//them du lieu

    		$this -> slider -> create($dataInsert);

    		return redirect() -> route('slider.index') -> with('success','Thêm Slider thành công');

    	}
    	catch(Exception $exception){
    		Log::error('Lỗi:'.getMessage().'------Dòng:'.getLine());
    	}
    }

    //sua slider

    public function edit($id)
    {
    	$slider = $this -> slider -> find($id);
    	return view('admin.slider.edit',compact('slider'));
    }

    public function update($id, Request $request)
    {
    	try
    	{
    		$dataUpdate = [
    			'name' => $request -> name,
    			'description' => $request -> description,
    			'content' => $request -> content,
    			'status' => $request -> status
    		];
    		//goi trail upload image
    		$dataImageSlider = $this -> storageImageUpload($request,'image_path','slider');

    		if(!empty($dataImageSlider)){
    			$dataUpdate['image_path'] = $dataImageSlider['file_path'];
    			$dataUpdate['image_name'] = $dataImageSlider['file_name'];
    		}
    		//them du lieu

    		$this -> slider -> find($id) -> update($dataUpdate);

    		return redirect() -> route('slider.index') -> with('success','Sửa Slider thành công');

    	}
    	catch(Exception $exception){
    		Log::error('Lỗi:'.getMessage().'------Dòng:'.getLine());
    	}
    }

    public function delete($id){

    	return $this -> deleteModelTrait($id, $this -> slider);

    }
}
