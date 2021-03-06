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
		//$this -> createImage($file);
	        //$filePath = $request -> file($fieldName) -> storeAs('public/'.$folderName.'/'. Auth::id(),$fileNameHash,'local');
		$filePath = $request -> file($fieldName) -> storeAs('public/'.$folderName.'/'. Auth::id(),$fileNameHash,'local');
		
		//$pathToFile = Storage::disk('public')->put('images', $file);
		//Storage::disk('local')->put('example.txt', 'Contents');
		//$path = public_path() . "/images/" . $fileNameOrigin;

		$imageBase = base64_encode(file_get_contents($file));
	        $dataUploadTrait = [
	        	'file_name' => $fileNameOrigin,
	        	'file_path' => Storage::url($filePath),
			'baseimage' => $imageBase
	        ];

	        return $dataUploadTrait;
    	}
    return null;

    }
	

	
    public function storageImageUploadMultiple($file,$folderName,$filetest)
    {
        
	      
	   
	    $fileNameOrigin = $file -> getClientOriginalName();
	    $fileNameHash = Str::random(20). '.'. $file -> getClientOriginalExtension();
	    //$medium_image =$this ->resize_image($filetest,$file, 300, 300, true);
	    $large_image_path=public_path($folderName.'/'.'large/'.$fileNameHash);
	    //$medium_image_path= 'https://drive.google.com/drive/folders/1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA/'. $fileNameHash;
            $small_image_path=public_path($folderName.'/'.'small/'.$fileNameHash);
	    
            //// Resize Images
            Image::make($file)->save($large_image_path);
	
            //Image::make($file)->resize(600,600) -> save($medium_image_path);
            Image::make($file)->resize(300,300)->save($small_image_path);
	    
	    
	    $googleDriveStorage = Storage::disk('google_drive');
	    //$file -> storeAs('1iuso5O6fepnoViK679d9EplkVHmN-UvY/1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA',$medium_image,'google_drive');
	   
	    //large:1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH
	    $filePath = $file -> storeAs('1iuso5O6fepnoViK679d9EplkVHmN-UvY/1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH',$fileNameHash,'google_drive');
	    
	   // $medium_path = Storage::url($filePath);
	    //$file_medium = Image::make($file)->resize(600,600) -> save($medium_path);
	    
	    //small:19_X0lc8GknbdDeEJ1vDo4ve7N2uPEaXs
	    //medium:1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA
	    
	    //$name_gg = 'https://drive.google.com/drive/folders/1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH/'.$fileNameHash;	
	        $dataUploadTrait = [
	        	'file_name' => $fileNameOrigin,
	        	'file_path' => Storage::url($filePath),
	        	'name' => $fileNameHash
	        ];

	        return $dataUploadTrait;
    }
}
