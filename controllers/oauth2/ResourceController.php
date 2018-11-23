<?php

/**
 * 资源服务器
 */

namespace app\controllers\oauth2;

use Yii;

class ResourceController extends \yii\rest\Controller
{
    public function init() 
    {
         Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    }

    private function server()
    {
        $pdo = new \PDO('mysql:host=127.0.0.1;dbname=artisanyii', "homestead", "secret");
        
        //创建存储的方式
        $storage = new \OAuth2\Storage\Pdo($pdo);
        
        //创建server
        $server = new \OAuth2\Server($storage);

        // 添加 Authorization Code 授予类型
        $server->addGrantType(new \OAuth2\GrantType\AuthorizationCode($storage));

        return $server;
    }

    // 测试资源
    public function actionUser()
    {
        $server = $this->server();
        // Handle a request to a resource and authenticate the access token
        if (!$server->verifyResourceRequest(\OAuth2\Request::createFromGlobals())) {
            $server->getResponse()->send();
            \Yii::$app->end();
        }

        $token = $server->getAccessTokenData(\OAuth2\Request::createFromGlobals());
        $scopes = explode(" ", $token['scope']);

        // todo 这里你可以写成自己规则的scope验证
        if (!$this->checkScope('basic', $scopes)) {
            return Yii::$app->response->data = ['success' => false, 'message' => '你没有获取该接口的scope'];
        }

        return Yii::$app->response->data = ['success' => true, 'message' => '你成功获取该接口信息', 'user_id'=>$token['user_id']];
    }

    // 用于演示检测scope的方法
    private function checkScope($myScope, $scopes)
    {
        return in_array($myScope, $scopes);
    }
}
