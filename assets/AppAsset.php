<?php

namespace app\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/font-awesome.min.css',
        'css/animate.min.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/bee3D.css',
        'css/style.css',
        'css/styles.css',
    ];
    public $js = [
        'js/socket.js',
        'js/script.js',
        // 'js/headroom.js',
        // 'js/bootstrap.min.js',
        'js/jquery.waypoints.js',
        'js/slick.min.js',
        'js/classie.js',
        'js/bee3D.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
