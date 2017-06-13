<?php

namespace app\assets;

use yii\bootstrap\BootstrapAsset;
use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css',
        'dist/custom.min.css',
        'wincalc/jquery-ui/themes/flick/jquery-ui.min.css',
        'wincalc/jQuery-ui-Slider-Pips/dist/jquery-ui-slider-pips.min.css',
        'wincalc/css/style.css',
        'font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        'wincalc/js/jquery.min.js',
        'wincalc/jquery-ui/jquery-ui.min.js',
        'wincalc/js/bootstrap.min.js',
        'wincalc/jQuery-ui-Slider-Pips/dist/jquery-ui-slider-pips.js',
        'wincalc/js/scripts.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
