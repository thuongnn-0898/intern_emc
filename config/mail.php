<?php

return [
    "driver" => "smtp",
    "host" => "smtp.mailtrap.io",
    "port" => 2525,
    "from" => array(
        "address" => "from@example.com",
        "name" => "Example"
    ),
    'reply_to' => ['address' => 'thuongnn1304@gmail.com', 'name' => 'InternShop'],
    "username" => "1a1dacb4ab08f9",
    "password" => "077eb4abfd3a8b",
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
