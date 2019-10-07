<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru',
    'defaultRoute' => 'services/home',
//    'defaultRoute' => 'category/index',

    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '9gJIUl0yn0h_V4NUpPLoSqPWeR9UA4gC',
            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@app/runtime/cache',
        ],

//        'cache' => 'yii\caching\FileCache',


        // 'session' => [
        //     'class' => 'yii\web\DbSession',
        // ],


        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => '/',
            'authTimeout' => 60 * 60 * 24 * 100, //100 дней
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'igorkri26@gmail.com',
                'password' => 'memory85',
                'port' => '465',
                'encryption' => 'ssl',
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
        'db' => $db,
        
          'i18n' => [
        'translations' => [
            'app*' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/messages',
                'sourceLanguage' => 'ru-RU',
                'fileMap' => [
                    'app'       => 'app.php',
                    'app/error' => 'error.php',
                ],
            ],
        ],
    ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<module:[\wd-]+>/<controller:[\wd-]+>/<action:[\wd-]+>/<id:\d+>/page/<page:\d+>' => '<module>/<controller>/<action>',
//                '<module:[\wd-]+>/<controller:[\wd-]+>/<action:[\wd-]+>/<id:\d+>' => '<module>/<controller>/<action>',
                '<module:[\wd-]+>/<controller:[\wd-]+>/<action:[\wd-]+>/<id:\d+>' => '<module>/<controller>/<action>',
                'category/<id:\d+>' => 'category/view',
                'search' => 'category/search',
                'microwave' => 'services/__view',
                'combine' => 'services/__view',
                'extract' => 'services/__view',
                'fridge' => 'services/__view',
                'hoover' => 'services/__view',
                'humidifier' => 'services/__view',
                'iron' => 'services/__view',
                'mincer' => 'services/__view',
                'multicooker' => 'services/__view',
                'oven-electro' => 'services/__view',
                'oven-gas' => 'services/__view',
                'stove-electro' => 'services/__view',
                'stove-gas' => 'services/__view',
                'stove-ind' => 'services/__view',
            ],
        ],

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],


        'assetManager' => [
        'bundles' => [
            'kartik\form\ActiveFormAsset' => [
                'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
            ],
        ],
    ],
        
    ],
    
     'modules' => [        
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'defaultRoute' => 'customer/index'
        ],
        'shop' => [
            'class' => 'app\modules\shop\Module',
            'defaultRoute' => 'category/index',
        ],
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok 
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'upload/store', //path to origin images
            'imagesCachePath' => 'upload/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick' 
            'placeHolderPath' => '@webroot/upload/store/no-image.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
        'treemanager' =>  [
            'class' => '\kartik\tree\Module',
            // other module settings, refer detailed documentation
    ]
    ],
    
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
