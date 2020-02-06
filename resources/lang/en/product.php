<?php

return [
    'table' => [
        'name' => 'Name',
        'price' => 'Prive',
        'image' => 'Image',
        'short' => 'Short Description',
        'long' => 'Long Description',
        'status' => 'Status',
        'quantity' => 'Quantity',
        'view' => 'View',
        'category' => 'Category',
        'created_at' => 'Created at',
        'options' => 'Options',
        'imageDetail' => 'Image details',

    ],
    'list' => 'List products',
    'productT'=> 'Create Product',
    'productE'=> 'Edit Product',
    'request' => [
        'name' => [
            'required' => 'The name is required',
            'max' => 'The name is too long',
            'min' => 'The name is to short',
            'uni' => 'The name is already'
        ],
        'price' => [
            'required' => 'The price is required',
            'number' => 'The name is not number',
        ],
        'quantity' => [
            'required' => 'The quantity is required',
            'numberic' => 'The quantity is not number',
            'min' => 'The quantity is to short',
        ],
        'shortText' => [
            'required' => 'The short description is required',
            'max' => 'The short description is to long',
        ],
        'longText' => [
            'required' => 'The long description is required',
        ],
        'category' => [
            'required' => 'You isn\'t choose Category',
        ],
        'image' => [
            'required' => 'The image is required',
            'mimes' => 'The image is invalid, must JPG, PNG, GIF, JPEG',
            'max' => 'The image has too big size',
        ],
        'review'=> [
            'requiredCont' => 'Please type content',
            'requiredMax' => 'Content too long',
            'requiredRates' => 'Please evaluate stars',

        ],
    ],
    'msg' => [
        'createSuss' => 'Create Product successfully',
        'updateSuss' => 'Update Product successfully',
        'destroySuss' => 'Destroy Product successfully',
        'destroyerr' => 'Has a/an errors, please try again!',
        'reviewSucc' => 'Review this product successfully',
        'reviewFail' => 'Review form invalid'
    ],
    'show' => [
        'reviewMsg' => ':count Review(s) | Add your review',
        'available' => 'Avaiable',
        'inavailable' => 'Inavaiable',
        'addCart' => 'Add to cart',
        'soldout' => 'SoldOut - Back',
        'share' => 'Share',
        'reviewUr' => 'Your review',
        'rateUr' => 'Your ratings',
        'firstReview' => 'There is no comments, let\'s the first person comment!',
        'order' => 'Let\'s order now!',

    ],
    'tab' => [
        'review' => 'Reiews',
        'details' => 'Details',
        'desc' => 'Description',
    ],
    'cartEmpty' => 'Your cart empty',
    'order'=> [
        'asc' => 'Ascending',
        'desc' => 'Descending',
        'shortBy' => 'Short by',
        'byPrice' => 'Short by price',
        'show' => 'Show',
        'topSell' => 'Top selling',
        'brand' => 'Brand',
        'price' => 'Price',
        'option' => 'Options',
    ],
];
?>
