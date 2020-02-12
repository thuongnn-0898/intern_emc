<?php

namespace App\Services;

use File;
use Illuminate\Support\Str;

class HandleImageService {

    protected $request;
    protected $object;
    protected $destinationPath;

    public function __construct($request, $object = null, $destinationPath = '/uploads')
    {
        $this->request = $request;
        $this->object = $object;
        $this->destinationPath = public_path($destinationPath);
    }

    public function excute() {
        $handle = $this->request;
        $image = $handle->file('image');
        if($this->object != null)
            $this->handleOldImage($this->object->image);
        $imageName = $this->handleImage($image);

        return $imageName;
    }

    public function handleImage($image){
        $imageName = time().Str::random(15).'.'.$image->getClientOriginalExtension();
        $image->move($this->destinationPath, $imageName);

        return $imageName;
    }

    public function handleOldImage($data)
    {
        if(is_array($data)){
            foreach ($data as $val){
                $this->deleteImage($val);
            }
        }else{
            $this->deleteImage($data);
        }
    }

    private function deleteImage($image)
    {
        $image_path = $this->destinationPath;
        $image = $image_path.'/'.$image;
        if(File::exists($image)) {
            File::delete($image);
        }
    }
}

?>
