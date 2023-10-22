<?php

namespace home\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/reset.css',
        'css/style.css',
        'css/swiper.min.css',
        'css/sjheadpublic.css',
        'css/index.css',
        'css/font_1111066_v0xppbwt5p.css',
    ];
    public $js = [
        'js/jquery.min.js',
        'js/swiper.min.js',
        'js/sjheadpublic.js',
        'js/index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
