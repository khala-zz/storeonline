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
/**
         * Image re-size
         * @param int $width
         * @param int $height
         */
        public function ImageResize($width, $height, $img_name)
        {
                /* Get original file size */
                list($w, $h) = getimagesize($_FILES['logo_image']['tmp_name']);


                /*$ratio = $w / $h;
                $size = $width;

                $width = $height = min($size, max($w, $h));

                if ($ratio < 1) {
                    $width = $height * $ratio;
                } else {
                    $height = $width / $ratio;
                }*/

                /* Calculate new image size */
                $ratio = max($width/$w, $height/$h);
                $h = ceil($height / $ratio);
                $x = ($w - $width / $ratio) / 2;
                $w = ceil($width / $ratio);
                /* set new file name */
                $path = $img_name;


                /* Save image */
                if($_FILES['logo_image']['type']=='image/jpeg')
                {
                    /* Get binary data from image */
                    $imgString = file_get_contents($_FILES['logo_image']['tmp_name']);
                    /* create image from string */
                    $image = imagecreatefromstring($imgString);
                    $tmp = imagecreatetruecolor($width, $height);
                    imagecopyresampled($tmp, $image, 0, 0, $x, 0, $width, $height, $w, $h);
                    imagejpeg($tmp, $path, 100);
                }
                else if($_FILES['logo_image']['type']=='image/png')
                {
                    $image = imagecreatefrompng($_FILES['logo_image']['tmp_name']);
                    $tmp = imagecreatetruecolor($width,$height);
                    imagealphablending($tmp, false);
                    imagesavealpha($tmp, true);
                    imagecopyresampled($tmp, $image,0,0,$x,0,$width,$height,$w, $h);
                    imagepng($tmp, $path, 0);
                }
                else if($_FILES['logo_image']['type']=='image/gif')
                {
                    $image = imagecreatefromgif($_FILES['logo_image']['tmp_name']);

                    $tmp = imagecreatetruecolor($width,$height);
                    $transparent = imagecolorallocatealpha($tmp, 0, 0, 0, 127);
                    imagefill($tmp, 0, 0, $transparent);
                    imagealphablending($tmp, true); 

                    imagecopyresampled($tmp, $image,0,0,0,0,$width,$height,$w, $h);
                    imagegif($tmp, $path);
                }
                else
                {
                    return false;
                }

                return true;
                imagedestroy($image);
                imagedestroy($tmp);
}
	
    public function storageImageUploadMultiple($file,$folderName)
    {
        
	      
	    $fileNameOrigin = $file -> getClientOriginalName();
	    $fileNameHash = Str::random(20). '.'. $file -> getClientOriginalExtension();
	    $large_image_path=public_path($folderName.'/'.'large/'.$fileNameHash);
	    //dd(Storage::disk('google_drive'));
	    //$path_google = Storage::disk('google_drive')->getDriver()->getAdapter()->getPathPrefix();
	    //dd(Storage::disk('google_drive')->getDriver()->getAdapter()->getPathPrefix());
	    //$metadata = Storage::disk('google_drive')->getAdapter()->getMetadata('1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA');
	    //dd($metadata);
            
	    //$medium_image_path= 'https://drive.google.com/drive/folders/1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA/'. $fileNameHash;
            $small_image_path=public_path($folderName.'/'.'small/'.$fileNameHash);
            //// Resize Images
            Image::make($file)->save($large_image_path);
	
            //Image::make($file)->resize(600,600) -> save($medium_image_path);
            Image::make($file)->resize(300,300)->save($small_image_path);
	    $medium_image =$this -> ImageResize(600, 600, $fileNameHash);
	    
	    $googleDriveStorage = Storage::disk('google_drive');
	    $file -> storeAs('1iuso5O6fepnoViK679d9EplkVHmN-UvY/1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA',$medium_image,'google_drive');
	    //$googleDriveStorage->put('test1.txt', 'Hello world');
	    //$filePath = $file -> storeAs('public/'.$folderName.'/'. Auth::id(),$fileNameHash);
	    //large:1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH
	    $filePath = $file -> storeAs('1iuso5O6fepnoViK679d9EplkVHmN-UvY/1Q7gpPodh56tCp1cY4mJ35F-mL7mW5ozH',$fileNameHash,'google_drive');
	    
	   // $medium_path = Storage::url($filePath);
	    //$file_medium = Image::make($file)->resize(600,600) -> save($medium_path);
	    
	    //small:19_X0lc8GknbdDeEJ1vDo4ve7N2uPEaXs
	    //medium:1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA
	    

	        $dataUploadTrait = [
	        	'file_name' => $fileNameOrigin,
	        	'file_path' => Storage::url($filePath),
	        	'name' => $fileNameHash
	        ];

	        return $dataUploadTrait;
    }
}
