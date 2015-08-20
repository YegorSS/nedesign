<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class PostsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/calc.css',
        'css/prettyPhoto.css',
        'css/odometer-theme-plaza.css',
        'owl-carousel/owl.carousel.css',
        'owl-carousel/owl.theme.css',
    ];
    public $js = [
        'scripts/calc.js',
        'scripts/jquery.prettyPhoto.js',
        'scripts/odometer.js',
        'scripts/post.js',
        'owl-carousel/owl.carousel.js',
        'owl-carousel/owl_carusel_index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}