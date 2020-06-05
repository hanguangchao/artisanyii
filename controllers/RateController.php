<?php

namespace app\controllers;

use Yii;
use yii\filters\HttpCache;
use yii\filters\PageCache;
use app\models\User;

class RateController extends \yii\web\Controller
{
    
    public function behaviors()
    {
        echo __METHOD__. PHP_EOL;
        $behaviors = parent::behaviors();
        $behaviors['rateLimiter']['class'] = \yii\filters\RateLimiter::className();
        $behaviors['rateLimiter']['enableRateLimitHeaders'] = true;
        return $behaviors;
    }



    public function beforeAction($action)
    {
        echo __METHOD__. PHP_EOL;
        if (Yii::$app->user->isGuest) {
            $identity = User::findOne(['username' => 'root']);
            echo __METHOD__. '  ========login========='. PHP_EOL;
            // 登录用户
            Yii::$app->user->login($identity);
        }

        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        // 当前用户的身份实例。未认证用户则为 Null 。
$identity = Yii::$app->user->identity;

// 当前用户的ID。 未认证用户则为 Null 。
$id = Yii::$app->user->id;

// 判断当前用户是否是游客（未认证的）
$isGuest = Yii::$app->user->isGuest;

        #var_dump($identity, $id, $isGuest);

        // $identity = User::findOne(['username' => 'root']);

        // // 登录用户
        // Yii::$app->user->login($identity);
        return Yii::$app->user->id;
    }

}