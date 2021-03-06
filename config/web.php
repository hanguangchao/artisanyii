<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'timeZone' => 'Asia/Shanghai',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'TXYq6pfYaGxAe0DPwFw1vSOqC2ndSPb9',
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' => 0,
            'password' => null,
        ],
        'cache' => [
            'class' => 'yii\redis\Cache',
            'redis' => 'redis',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
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
                    'levels' => ['error', 'warning', 'info'],
                    'logVars' => [],
                ],
            ],
            
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'GET /oauth2' => '/oauth2/default/index',
                'GET,POST oauth2/authorize' => 'oauth2/rest/authorize',
                'POST oauth2/token' => 'oauth2/rest/token',
                'POST oauth2/refresh_token' => 'oauth2/rest/refresh-token',
                'GET oauth2/cb' => 'oauth2/client/cb',
                'GET,POST api/user' => 'oauth2/resource/user',
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%auth_item}}',
            'itemChildTable' => '{{%auth_item_child}}',
            'assignmentTable' => '{{%auth_assignment}}',
            'ruleTable' => '{{%auth_rule}}',
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@vendor/dmstr/yii2-adminlte-asset/example-views/yiisoft/yii2-app'
                ],
            ],
        ],
        'redis' => [
            'class' => 'yii\redis\Connection',
            'hostname' => '127.0.0.1',
            'port' => 6379,
            'database' => 0,
            'password' => null,
        ],
        'mutex' => [
            'class' => \pastuhov\yii2redismutex\RedisMutex::className(),
            'redis' => 'redis',
            'expireTime' => 10,
        ],
        'session' => [
            'name' => 'YIISESSID',
            'cookieParams' => [
                'lifetime' => 60 * 30,
                'httponly' => true,
            ],
            'timeout'=> 60 * 30,
        ],
    ],
    'params' => $params,
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        'admin' => [
            'class' => 'mdm\admin\Module',
            'layout' => 'left-menu',    // defaults to null, using the application's layout without the menu
                                // other available values are 'right-menu' and 'top-menu'
            'mainLayout' => '@app/views/layouts/main.php',
            'controllerMap' => [
                'assignment' => [
                    'class' => 'mdm\admin\controllers\AssignmentController',
                    'userClassName' => 'app\models\User',
                    'idField' => 'id',
                ],
            ],
            // 'menus' => [
                // 'assignment' => [
                //     'label' => 'Grant Access' // change label
                // ],
                // 'route' => null, // disable menu
            // ],
        ],
        'manager' => [
            'class' => 'app\modules\manager\Module',
        ],
        'recite' => [
            'class' => 'app\modules\Recite\Module',
        ],

    ],
    'on beforeRequest' => function ($event) {
        if (extension_loaded('xhprof') && YII_ENV_DEV && YII_DEBUG) {
            xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_CPU | XHPROF_FLAGS_MEMORY);
        }
    },
    'on beforeAction' => function ($event) {
        //
    },
    'on afterAction' => function ($event) {
        $response = Yii::$app->response;
        $response->getHeaders()->set('x-request-id', sprintf("%s:%s:%s", gethostname(), getmypid(), time()));
    },
    'on afterRequest' => function ($event) {
        if (extension_loaded('xhprof') && YII_ENV_DEV && YII_DEBUG) {
            
            $data = xhprof_disable();   //返回运行数据

            // xhprof_lib在下载的包里存在这个目录,记得将目录包含到运行的php代码中
            include_once dirname(__FILE__) . "/../web/xhprof-0.9.0/xhprof_lib/utils/xhprof_lib.php";  
            include_once dirname(__FILE__) . "/../web/xhprof-0.9.0/xhprof_lib/utils/xhprof_runs.php";  
             
            $objXhprofRun = new XHProfRuns_Default(); 

            // 第一个参数j是xhprof_disable()函数返回的运行信息
            // 第二个参数是自定义的命名空间字符串(任意字符串),
            // 返回运行ID,用这个ID查看相关的运行结果
            $run_id = $objXhprofRun->save_run($data, "xhprof_foo");

            // 设置一个Pragma 头. 任何已存在的Pragma 头都会被丢弃
            Yii::$app->response->headers->set('xhprof_view', '/xhprof-0.9.0/xhprof_html/index.php?run='. $run_id . '&source=xhprof_foo');
        }
    },

];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*',],
    ];
}

return $config;
