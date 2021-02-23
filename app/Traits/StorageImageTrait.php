<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use Image;

/**
 * summary
 */
trait StorageImageTrait
{

    public function storageImageUpload($request,$fieldName,$folderName)
    {
        if($request -> hasFile($fieldName)){
	        $file = $request -> $fieldName;
	        $fileNameOrigin = $file -> getClientOriginalName();
	        $fileNameHash = Str::random(20). '.'. $file -> getClientOriginalExtension();
		
	        $filePath = $request -> file($fieldName) -> storeAs('public/'.$folderName.'/'. Auth::id(),$fileNameHash,'local');
		
		//$pathToFile = Storage::disk('public')->put('uploads/'.$folderName.'/'. Auth::id(), $fileNameHash);

	        $dataUploadTrait = [
	        	'file_name' => $fileNameOrigin,
	        	'file_path' => Storage::url($filePath)
	        ];

	        return $dataUploadTrait;
    	}
    return null;

    }

    public function storageImageUploadMultiple($file,$folderName)
    {
        
	        $fileNameOrigin = $file -> getClientOriginalName();
	        $fileNameHash = Str::random(20). '.'. $file -> getClientOriginalExtension();

	
	        $large_image_path=public_path($folderName.'/'.'large/'.$fileNameHash);
            $medium_image_path=public_path($folderName.'/'.'medium/'.$fileNameHash);
            $small_image_path=public_path($folderName.'/'.'small/'.$fileNameHash);
            //// Resize Images
            Image::make($file)->save($large_image_path);
            Image::make($file)->resize(600,600)->save($medium_image_path);
            Image::make($file)->resize(300,300)->save($small_image_path);
	        $filePath = $file -> storeAs('public/'.$folderName.'/'. Auth::id(),$fileNameHash);

	        $dataUploadTrait = [
	        	'file_name' => $fileNameOrigin,
	        	'file_path' => Storage::url($filePath),
	        	'name' => $fileNameHash
	        ];

	        return $dataUploadTrait;
    

    }
}
