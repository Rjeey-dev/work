<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '2q3ng52Zkmrmqy2ObABnSAuiHXS1l_dN',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\UserIndentity',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
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
       /* 'i18n'          => [
            'translations' => [
                'app*'  => [
                    'class'          => \yii\i18n\PhpMessageSource::class,
                    //'basePath' => '@app/messages',
                    'sourceLanguage' => 'xx-XX',
                    'fileMap'        => [
                        'app' => 'app.php',
                    ],
                ],

            ],
        ],*/
        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                   // 'basePath' => '@app/messages',
                    'sourceLanguage' => 'xx-XX',
                    'fileMap' => [
                        'app'  => 'app.php',
                    ],
                ],
            ],
        ],

        'db' => $db,
        'dbSwMaster' => [
            'class'               => yii\db\Connection::class,
            'dsn'                 => 'pgsql:host=postgresql-0-4.mango.local;dbname=sw',
            'username'            => 'weblk7',
            'password'            => 'h1ace35d',
            'charset'             => 'utf8',
            'enableSchemaCache'   => true,
            'enableQueryCache'    => true,
            'schemaCacheDuration' => 7200,

            // 'appName'             => 'WebLk8',
            // 'testQuery'           => 'SELECT * FROM sw.points LIMIT 1',

           // 'appName'             => 'WebLk8',
           // 'testQuery'           => 'SELECT * FROM sw.points LIMIT 1',

        ],
        'dbBillingMaster' => [
            'class'               => yii\db\Connection::class,
            'dsn'                 => 'pgsql:host=postgresql-2-61.mango.local;dbname=billing',
            //      'dsn'               => 'pgsql:host=192.168.5.39;port=5444;dbname=billing',
            'username'            => 'weblk7',
            'password'            => 'h1ace35d',
            'charset'             => 'utf8',
            'enableSchemaCache'   => true,
            'schemaCacheDuration' => 7200,
            'enableQueryCache'    => true,
            //'appName'             => 'WebLk8',

            // 'testQuery'           => 'SELECT billing_iweb.get_prov_regions()',

           // 'testQuery'           => 'SELECT billing_iweb.get_prov_regions()',

        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
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
