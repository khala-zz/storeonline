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
	
public function resize_image($file, $w = 1200, $h = 741, $crop = false)
   {
       try {
           $ext = pathinfo(storage_path() . $file, PATHINFO_EXTENSION);
           list($width, $height) = getimagesize($file);
           // if the image is smaller we dont resize
           if ($w > $width && $h > $height) {
               return true;
           }
           $r = $width / $height;
           if ($crop) {
               if ($width > $height) {
                   $width = ceil($width - ($width * abs($r - $w / $h)));
               } else {
                   $height = ceil($height - ($height * abs($r - $w / $h)));
               }
               $newwidth = $w;
               $newheight = $h;
           } else {
               if ($w / $h > $r) {
                   $newwidth = $h * $r;
                   $newheight = $h;
               } else {
                   $newheight = $w / $r;
                   $newwidth = $w;
               }
           }
           $dst = imagecreatetruecolor($newwidth, $newheight);

           switch ($ext) {
               case 'jpg':
               case 'jpeg':
                   $src = imagecreatefromjpeg($file);
                   break;
               case 'png':
                   $src = imagecreatefrompng($file);
                   imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
                   imagealphablending($dst, false);
                   imagesavealpha($dst, true);
                   break;
               case 'gif':
                   $src = imagecreatefromgif($file);
                   imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
                   imagealphablending($dst, false);
                   imagesavealpha($dst, true);
                   break;
               case 'bmp':
                   $src = imagecreatefrombmp($file);
                   break;
               default:
                   throw new Exception('Unsupported image extension found: ' . $ext);
                   break;
           }
           $result = imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
           switch ($ext) {
               case 'bmp':
                   imagewbmp($dst, $file);
                   break;
               case 'gif':
                   imagegif($dst, $file);
                   break;
               case 'jpg':
               case 'jpeg':
                   imagejpeg($dst, $file);
                   break;
               case 'png':
                   imagepng($dst, $file);
                   break;
           }
           return true;
       } catch (Exception $err) {
           // LOG THE ERROR HERE 
           return false;
       }
   }
	
    public function storageImageUploadMultiple($file,$folderName)
    {
        
	      
	    $fileNameOrigin = $file -> getClientOriginalName();
	    $fileNameHash = Str::random(20). '.'. $file -> getClientOriginalExtension();
	    
	    $large_image_path=public_path($folderName.'/'.'large/'.$fileNameHash);
	    //$medium_image_path= 'https://drive.google.com/drive/folders/1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA/'. $fileNameHash;
            $small_image_path=public_path($folderName.'/'.'small/'.$fileNameHash);
            //// Resize Images
            Image::make($file)->save($large_image_path);
	
            //Image::make($file)->resize(600,600) -> save($medium_image_path);
            Image::make($file)->resize(300,300)->save($small_image_path);
	    $medium_image =$this ->resize_image($file, 300, 300,false);
	    
	    $googleDriveStorage = Storage::disk('google_drive');
	    $file -> storeAs('1iuso5O6fepnoViK679d9EplkVHmN-UvY/1TZZWa2MumDZjO-gKIPjaFPCi2nvbFcvA',$medium_image,'google_drive');
	   
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
