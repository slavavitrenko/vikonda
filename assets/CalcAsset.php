<?php

namespace app\assets;

use yii\web\AssetBundle;


class CalcAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
          'css/styles.css',
    ];
    public $js = [
        'js/shims.js',
        'js/app.js',
        'js/dropdown.js'
    ];
    public $depends = [
        'app\assets\AppAsset',
    ];
}
