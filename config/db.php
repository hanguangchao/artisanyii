<?php

$host = PHP_SAPI == 'cli' ?  '127.0.0.1' : '10.10.10.1';
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='. $host . ';dbname=artisanyii',
    'username' => 'root',
    'password' => 'secret',
    'charset' => 'utf8',
    'enableSchemaCache' => true,
    'schemaCacheDuration' => 3600,
    'enableProfiling' => YII_ENV_DEV ? true : false, //since 2.0.12
    'enableLogging' => YII_ENV_DEV ? true : false, //since 2.0.12
    

    'attributes' => [
        PDO::ATTR_TIMEOUT => 30,
    ],

];
