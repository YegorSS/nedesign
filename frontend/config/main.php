<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                ['pattern' => 'sitemap', 'route' => 'sitemap/default/index', 'suffix' => '.xml'],
                'site/rss' => 'site/rss',
                'site/createcollback' => 'site/createcollback',
                'site/createfeedback' => 'site/createfeedback',
                'site/search' => 'site/search',
                'rating' => 'site/rating',
                'contact' => 'site/contact',
                'about' => 'site/about',
                '<id:\d+>' => 'site/category',
                'news/<alias:[\w\-]+>' => 'site/news',
                '<alias:[\a-z\-]+>' => 'site/post',
                '/' => 'site/index',
                '<teg:[\а-я1-9\-]+>' => 'site/teg',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
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
    ],
    'params' => $params,
    'modules' => [
        'sitemap' => [
            'class' => 'himiklab\sitemap\Sitemap',
            'models' => [
                // your models
                'common\models\Posts',
                'common\models\Categories',
                'common\models\News',
                'common\models\Pages'
                
            ],
            'urls'=> [
               // your additional urls
               [
                   'loc' => '@web',
                   'changefreq' => \himiklab\sitemap\behaviors\SitemapBehavior::CHANGEFREQ_DAILY,
                   'priority' => 0.8,
                 //  'news' => [
                 //      'publication'   => [
                 //           'name'          => 'Example Blog',
                  //          'language'      => 'en',
                  //      ],
                  //      'access'            => 'Subscription',
                 //       'genres'            => 'Blog, UserGenerated',
                 //      'publication_date'  => 'YYYY-MM-DDThh:mm:ssTZD',
                  //     'title'             => 'Example Title',
                  //     'keywords'          => 'example, keywords, comma-separated',
                  //     'stock_tickers'     => 'NASDAQ:A, NASDAQ:B',
                 //  ],
                   // 'images' => [
                    //    [
                    //        'loc'           => 'http://example.com/image.jpg',
                    //        'caption'       => 'This is an example of a caption of an image',
                    //        'geo_location'  => 'City, State',
                    //        'title'         => 'Example image',
                    //        'license'       => 'http://example.com/license',
                  //      ],
                   // ],
               ],
           ],
           'enableGzip' => true, // default is false
           'cacheExpire' => 1, // 1 second. Default is 24 hours
        ],
    ],
];
