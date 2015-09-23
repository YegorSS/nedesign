<?php 

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=test',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
    ],
    'aliases' => [
        '@admin' => 'http://' . $_SERVER["HTTP_HOST"] . '/admin';
        '@front' => 'http://' . $_SERVER["HTTP_HOST"];
    ],
];