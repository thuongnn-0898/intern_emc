<?php

namespace App\Services;

use App\Models\ImageDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use File;
use Illuminate\Support\Str;

class ProductService {

    protected $request;
    protected $product;
    protected $destinationPath;

    public function __construct($request, $product = null)
    {
        $this->request = $request;
        $this->product = $product;
        $this->destinationPath = public_path('/uploads');
    }

    public function excute() {
        $handle = $this->request;
        $image = $handle->file('image');
        if($this->product != null)
            $this->handleOldImage();
        $imageName = $this->handleImage($image);
        return $imageName;
    }

    public function handleImage($image){
        $imageName = time().Str::random(20).'.'.$image->getClientOriginalExtension();
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
