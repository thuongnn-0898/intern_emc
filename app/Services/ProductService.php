<?php

namespace App\Services;

use App\Models\ImageDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService {

    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    public function excute() {
        $handle = $this->request;
        $image = $handle->file('image');
        $imageName = $this->handleImage($image);
        return $imageName;
    }

    public function handleImage($image){
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads');
        $image->move($destinationPath, $imageName);
        return $imageName;
    }
}

?>
