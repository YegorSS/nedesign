<?php
require(Yii::getAlias('@common').'/config/config.php');
$url = explode('.', $_SERVER['HTTP_HOST']);
$files = scandir(Yii::getAlias('@common').'/config/db');

foreach($files as $file){
    $dbname = explode('.', $file);
    if($url[0] == $dbname[0]){
        return require('db/' . $file);
    }
}



return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host='.MYSQL_HOST.';dbname='.DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASS,
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
    ],
    'aliases' => [
        '@admin' => 'http://' . URL_ADMIN,
        '@front' => 'http://' . URL_FRONTEND,
    ],
];

