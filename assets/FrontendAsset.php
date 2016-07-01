<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FrontendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/font-awesome.css',
        'css/animate.min.css',
        'css/slick.css',
        'css/click-theme.css',
        'css/bee3D.css',
        'css/style.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/jquery.waypoints.js',
        'js/slick.min.js',
        'js/classie.js',
        'js/bee3D.js',
        'js/main.js',
    ];
    public $depends = [
        'app/AppAsset',
    ];
}
