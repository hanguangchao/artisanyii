<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=artisanyii',
    'username' => 'homestead',
    'password' => 'secret',
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,
    'enableProfiling' => YII_ENV_DEV ? true : false, //since 2.0.12
    'enableLogging' => YII_ENV_DEV ? true : false, //since 2.0.12
    'slaveConfig' => [
        'username' => 'homestead',
        'password' => 'secret',
        'attributes' => [
            // use a smaller connection timeout
            PDO::ATTR_TIMEOUT => 10,
        ],
    ],
    // 配置从服务器组
    'slaves' => [
        [
            'dsn' => 'mysql:host=localhost;dbname=artisanyii',
        ],
    ],

    'attributes' => [
        PDO::ATTR_TIMEOUT => 10,
    ],

];
