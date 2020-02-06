<?php

return [
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "from@example.com",
        "name" => "Example"
    ),
    'reply_to' => ['address' => env('MAIL_USERNAME'),'name' => 'InternShop'],
    "username" => env('MAIL_USERNAME'),
    "password" => env('MAIL_USERNAME'),
    "sendmail" => "/usr/sbin/sendmail -bs",
    'encryption' => env('MAIL_ENCRYPTION', 'tls'),
    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],
    'log_channel' => env('MAIL_LOG_CHANNEL'),

];
