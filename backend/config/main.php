<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'calculator' => [
            'class' => 'backend\modules\calculator\Module',
            // ... другие настройки модуля ...
        ],
        'subdomain' => [
            'class' => 'backend\modules\subdomain\Module',
            // ... другие настройки модуля ...
        ],
    ],
    'components' => [
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'imap' => [
         'class' => 'backend\modules\imap\Imap',
         'connection' => [
              'imapPath' => '{mail.1design.ua:143/novalidate-cert}',
              'imapLogin' => 'yegor@1design.ua',
              'imapPassword' => '20476',
              'serverEncoding'=>'encoding', // utf-8 default.
              'attachmentsDir'=> Yii::getAlias('@backend').'/web/uploads/mail'
        ],
        ],
    ],
    'params' => $params,
];
