<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8727fbf11451e330955f3a903508c524
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\swiftmailer\\' => 16,
            'yii\\redactor\\' => 13,
            'yii\\imagine\\' => 12,
            'yii\\httpclient\\' => 15,
            'yii\\gii\\' => 8,
            'yii\\faker\\' => 10,
            'yii\\debug\\' => 10,
            'yii\\composer\\' => 13,
            'yii\\codeception\\' => 16,
            'yii\\bootstrap\\' => 14,
            'yii\\authclient\\' => 15,
            'yii\\' => 4,
        ),
        'l' => 
        array (
            'leandrogehlen\\treegrid\\' => 23,
        ),
        'k' => 
        array (
            'kartik\\sidenav\\' => 15,
            'kartik\\select2\\' => 15,
            'kartik\\plugins\\fileinput\\' => 25,
            'kartik\\nav\\' => 11,
            'kartik\\file\\' => 12,
            'kartik\\dropdown\\' => 16,
            'kartik\\base\\' => 12,
        ),
        'd' => 
        array (
            'dektrium\\user\\' => 14,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\swiftmailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-swiftmailer',
        ),
        'yii\\redactor\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiidoc/yii2-redactor',
        ),
        'yii\\imagine\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-imagine',
        ),
        'yii\\httpclient\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-httpclient',
        ),
        'yii\\gii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-gii',
        ),
        'yii\\faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-faker',
        ),
        'yii\\debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-debug',
        ),
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\codeception\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-codeception',
        ),
        'yii\\bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-bootstrap',
        ),
        'yii\\authclient\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-authclient',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'leandrogehlen\\treegrid\\' => 
        array (
            0 => __DIR__ . '/..' . '/leandrogehlen/yii2-treegrid',
        ),
        'kartik\\sidenav\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-sidenav',
        ),
        'kartik\\select2\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-select2',
        ),
        'kartik\\plugins\\fileinput\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/bootstrap-fileinput',
        ),
        'kartik\\nav\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-nav-x',
        ),
        'kartik\\file\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-fileinput',
        ),
        'kartik\\dropdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-dropdown-x',
        ),
        'kartik\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-krajee-base',
        ),
        'dektrium\\user\\' => 
        array (
            0 => __DIR__ . '/..' . '/dektrium/yii2-user',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $prefixesPsr0 = array (
        'I' => 
        array (
            'Imagine' => 
            array (
                0 => __DIR__ . '/..' . '/imagine/imagine/lib',
            ),
        ),
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'D' => 
        array (
            'Diff' => 
            array (
                0 => __DIR__ . '/..' . '/phpspec/php-diff/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8727fbf11451e330955f3a903508c524::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8727fbf11451e330955f3a903508c524::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit8727fbf11451e330955f3a903508c524::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
