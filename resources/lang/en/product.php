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
    'requrest' => [
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
            'cate' => 'You isn\'t choose Category',
        ],
        'image' => [
            'required' => 'The image is required',
            'mimes' => 'The image is invalid, must JPG, PNG, GIF, JPEG',
            'max' => 'The image has too big size',
        ],

    ],
];
?>
