<?php

namespace app\assets;

use yii\web\AssetBundle;


class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.min.css',
        'css/animate.min.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/bee3D.css',
        'css/style.css',
    ];
    public $js = [
        // 'js/bootstrap.min.js',
        'js/jquery.waypoints.js',
        'js/slick.min.js',
        'js/classie.js',
        'js/bee3D.js',
        // 'js/main.js',
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
