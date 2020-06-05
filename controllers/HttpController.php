<?php

namespace app\controllers;

use Yii;
use yii\filters\HttpCache;
use yii\filters\PageCache;

class HttpController extends \yii\web\Controller
{
    public $layout = false;

    public function behaviors()
    {
        return [
            [
                'class' => HttpCache::className(),
                // 'cacheControlHeader' => 'public, max-age=3600',
                // 'sessionCacheLimiter' => 'private_no_expire',
                'only' => ['index'],
                'lastModified' => function ($action, $params) { 
                    return strtotime('2019-10-01 01:00:00');
                },
                'etagSeed' => function ($action, $params) {
                    return serialize(['config_get', 'v2']);
                },
            ],

            // 'pageCache' => [
            //     'class' => PageCache::className(),
            //     'only' => ['page-cache'],
            //     'duration' => 3600,
            //     'dependency' => [
            //         'class' => \yii\caching\ExpressionDependency::className(),
            //         'expression' => 0 == intval(Yii::$app->request->get('debug', 0)),
            //     ],
            //     'variations' => [
            //         \Yii::$app->language,
            //     ]
            // ],
        ];
    }

    public function beforeAction($action)
    {
        $session  = Yii::$app->session;
        parent::beforeAction($action);
        $session  = Yii::$app->session;
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), session_id(), time() + $session->getTimeout(),
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        $session['expiredAt'] = date('Y-m-d H:i:s', time() + $session->getTimeout());
        return true;
    }

    public function actionIndex()
    {
        // echo str_repeat("-=", 10);
        // exit;
        // // var_dump($x);
        // // exit;
        return str_repeat('a', 1024 * 1024 );
        return 'a';
    }

}
