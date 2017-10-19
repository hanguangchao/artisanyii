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
];
