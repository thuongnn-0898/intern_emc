<?php

return [
  'table' => [
      'name' => 'Name',
      'email' => 'Email',
      'status' => 'Status',
      'role' => 'Role',
      'created' => 'Created At',
      'avatar' => 'Avatar',
      'language' => 'Language',
      'country' => 'Country',
      'address' => 'Address',
      'image' => 'Avatar',
  ],
    'msg' => [
        'createSucc' => 'Create User Successfully',
        'updateSucc' => 'Update User Successfully',
        'updateFail' => 'Update User fail, please try again!',
        'destroySucc' => 'Destroy User Successfully',
        'createFail' => 'Has a/an error(s). please try again',
        'handing' => 'Update status successfully',
        'notFound' => 'User Notfound',
        'inactive' => 'Your account has been inactive',
    ],
    'edit' => 'Edit',
    'baseInf' => 'Base Information',
    'detailInf' => 'Detail Information',
    'form' => [
      'name' => [
          'title' => 'Name',
          'holder' => 'Please enter the name',
      ],
      'email' => [
          'title' => 'Email',
          'holder' => 'Please enter the email',
      ],
      'password' => [
          'title' => 'Password',
          'holder' => 'Please enter the password',
      ],
      'password_confirm' => [
          'title' => 'Password Confirm',
          'holder' => 'Please enter the password confirm',
      ],
      'country' => [
          'title' => 'Country',
          'holder' => 'Please enter the country',
      ],
      'phone' => [
          'title' => 'Phone',
          'holder' => 'Please enter the phone',
      ],
      'state' => [
          'title' => 'State',
          'holder' => 'Please enter the state',
      ],
      'address' => [
          'title' => 'Address',
          'holder' => 'Please enter the address',
      ],
      'image' => [
          'title' => 'Avatar',
          'holder' => 'Please enter choose avatar',
       ],
      'role' => 'Role',
      'status' => 'Status',
      'language' => 'Lang',

    ],
    'valid' => [
        'name' => [
            'required' => 'The name is required',
            'max' => 'The name is too long',
            'min' => 'The name is too short',
        ],
        'email' => [
            'required' => 'The email is required',
            'email' => 'The email is invalid',
            'uni' => 'The email is already',
        ],
        'password' => [
            'required' => 'The password is required',
            'max' => 'The password is too long',
            'min' => 'The password is too short',
        ],
        'phone' => [
            'required' => 'The phone is required',
            'numeric' => 'The phone not is numeric',
            'max' => 'The phone is too long',
            'min' => 'The phone is too short',
        ],
        'role' => [
            'required' => 'The role is required',
        ],
        'status' => [
            'required' => 'The role is required',
        ],
        'language' => [
            'required' => 'The Language is required',
        ],
    ],
];
?>
