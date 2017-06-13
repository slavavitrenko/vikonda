<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'windoors',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'on beforeAction' => function($event){
        $seo = \app\models\SettingsSeo::findOne(['identificator' => Yii::$app->controller->id .
            '-' . Yii::$app->controller->action->id]);
        if($seo){
            Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $seo->title]);
            Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $seo->description]);
            Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords]);
        }
    },
    'components' => [
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'app' => 'app.php',
                    ],
                ],
            ],
        ],
        'request' => [
            'cookieValidationKey' => 'zUTf69AJbhsqFeeHg9tO-YXBoJoiFv7i',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // 'mailer' => [
        //     'class' => 'yii\swiftmailer\Mailer',
        //     'useFileTransport' => true,
        // ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@app/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.yandex.ru',
                'username' => 'mxuser@ya.ru',
                'password' => 'MjNhmjnh34',
                'port' => '587',
                'encryption' => 'TLS',
            ],
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
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'site/calculate/window' => 'site/calculate',
                'site/calculate/door' => 'site/calculate',
                // 'category/<id:\w+>' => 'products/category',
                'product/<id:\w+>' => 'products/view',
                '/dopomoga/category/<slug:[\w-]+>' => '/dopomoga/category',
                '/dopomoga/novini/<slug:[\w-]+>' => '/dopomoga/view',
                //'/<lang:[\w-]+>/category/<slug:[\w-]+>' => '/site/category/<lang:[\w-]+>',
                '/<lang:[\w-]+>/category/<slug:[\w-]+>' => '/categoriesblog/category',
                '/category/<slug:[\w-]+>' => '/categoriesblog/category',
                '/<lang:[\w-]+>/tender/<slug:[\w-]+>' => '/site/view',
                '/tender/<slug:[\w-]+>' => '/site/view',
                '/page/<slug:[\w-]+>' => '/categoriesblog/page',
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@dektrium/user/views' => '@app/views/user'
                ],
            ],
        ],
        'cart' => [
            'class' => 'app\components\Cart'
        ]
    ],
    'modules' => [
        'redactor' => 'yii\redactor\RedactorModule',
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableConfirmation' => false,
            'enableRegistration' => false,
            'enablePasswordRecovery' => false,
            'admins' => ['admin'],
            'modelMap' => [
                'User' => 'app\models\user\User',
                'UserSearch' => 'app\models\user\UserSearch',
            ],
            'controllerMap' => [
                'admin' => 'app\controllers\user\AdminController',
                // 'security' => 'app\controllers\user\SecurityController',
            ]
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.0.*', '93.78.238.18']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '192.168.0.*', '93.78.238.18'],
    ];
}

return $config;
