<?php
return [
    'sourceLanguage'=>'en_US',
    'language'=>'en',
    'charset'=>'utf-8',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            // you will configure your module inside this file
            // or if need different configuration for frontend and backend you may
            // configure in needed configs
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
