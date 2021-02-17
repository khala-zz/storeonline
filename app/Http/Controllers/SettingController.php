<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SettingRequest;

use App\Models\Setting;

//goi delete trait

use App\Traits\DeleteModelTrait;

class SettingController extends Controller
{
    private $setting;

    use DeleteModelTrait;
    
    public function __construct(Setting $setting)
    {
    	$this -> setting = $setting;
    }
    //liet ke setting
    public function index()
    {
    	$settings = $this -> setting -> latest() -> paginate(5);
    	return view('admin.setting.index',compact('settings'));
    }
    //thêm setting
    public function create()
    {
    	return view('admin.setting.add');
    }

    public function store(SettingRequest $request)
    {
    	
    	$this -> setting -> create([
    		'config_key' => $request -> config_key,
    		'config_value' => $request -> config_value,
    		'type' => $request -> type,
    		'status' => $request -> status
    	]);

    	return redirect() -> route('setting.index') -> with('succes','Thêm setting thành công');
    }

    //cap nhat setting
    public function edit($id)
    {
    	$setting = $this -> setting -> find($id);
    	return view('admin.setting.edit',compact('setting'));
    }

    public function update($id,SettingRequest $request)
    {
    	$this -> setting -> find($id) -> update([
    		'config_key' => $request -> config_key,
    		'config_value' => $request -> config_value,
    		'status' => $request -> status
    	]);

    	return redirect() -> route('setting.index') -> with('succes','Sửa setting thành công');
    }

    //xoa setting

    public function delete($id)
    {
    	return $this -> deleteModelTrait($id,$this -> setting);
    }

}
