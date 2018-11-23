<?php

/**
 * Authorization Server 角色
 * 认证服务器，即服务提供商专门用来处理认证的服务器。
 */
namespace app\controllers\oauth2;

use Yii;

class RestController extends \yii\rest\Controller
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

    public function actionAuthorize()
    {
        // 该页面请求地址类似：
        // http://sxx.qkl.local/v2/oauth/authorize?response_type=code&client_id=testclient&state=xyz&redirect_uri=http://sxx.qkl.local/v2/oauth/cb&scope=basic%20get_user_info%20upload_pic
        //获取server对象
        $server = $this->server();
        $request = \OAuth2\Request::createFromGlobals();
        $response = new \OAuth2\Response();

        // 验证 authorize request
        // 这里会验证client_id，redirect_uri等参数和client是否有scope
        if (!$server->validateAuthorizeRequest($request, $response)) {
            $response->send();
            die;
        }

        // 显示授权登录页面
        if (Yii::$app->request->getIsGet()) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_HTML;
            //获取client类型的storage
            //不过这里我们在server里设置了storage，其实都是一样的storage->pdo.mysql
            $pdo = $server->getStorage('client');
            unset($response);
            //获取oauth_clients表的对应的client应用的数据
            $clientInfo = $pdo->getClientDetails($request->query('client_id'));
            
            $model = new \app\models\LoginForm();
            return $this->render('authorize', [
                'clientInfo' => $clientInfo,
                'model' => $model,
            ]);
        }
        if (Yii::$app->request->getIsPost()) {
            $model = new \app\models\LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                
            }
        }

        $is_authorized = true;
        // 当然这部分常规是基于自己现有的帐号系统验证
        // if (!$uid = $this->checkLogin($request)) {
        //     $is_authorized = false;
        // }
        $uid = Yii::$app->user->id;
        $is_authorized = $uid ? true : false;

        // var_dump($is_authorized, $uid);
        // exit;
        // 这里是授权获取code，并拼接Location地址返回相应
        // Location的地址类似：http://sxx.qkl.local/v2/oauth/cb?code=69d78ea06b5ee41acbb9dfb90500823c8ac0241d&state=xyz
        // 这里的$uid不是上面oauth_users表的uid, 是自己系统里的帐号的id，你也可以省略该参数
        $server->handleAuthorizeRequest($request, $response, $is_authorized, $uid);
    //        if ($is_authorized) {
    //            // 这里会创建Location跳转，你可以直接获取相关的跳转url，用于debug
    //            $code = substr($response->getHttpHeader('Location'), strpos($response->getHttpHeader('Location'), 'code=')+5, 40);
    //            exit("SUCCESS! Authorization Code: $code :: " . $response->getHttpHeader('Location'));
    //        }
        return $response->send();
    }

    public function actionToken()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $server = $this->server();
        $server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();
        exit();
    }

    private function refresh_token_server()
    {
        $pdo = new \PDO('mysql:host=127.0.0.1;dbname=artisanyii', "homestead", "secret");
        $storage = new \OAuth2\Storage\Pdo($pdo);

        $config = [
            'always_issue_new_refresh_token' => true,
            'refresh_token_lifetime'         => 2419200,
        ];

        $server = new \OAuth2\Server($storage, $config);

        // 添加一个 RefreshToken 的类型
        $server->addGrantType(new \OAuth2\GrantType\RefreshToken($storage, [
            'always_issue_new_refresh_token' => true
        ]));

        // 添加一个token的Response
        $server->addResponseType(new \OAuth2\ResponseType\AccessToken($storage, $storage, [
            'refresh_token_lifetime' => 2419200,
        ]));

        return $server;
    }

    /**
     * 刷新token
    
    $post_data = [
        'grant_type' => 'refresh_token',
        'refresh_token' => 'd9c5bee6a4ad7967ac044c99e40496aa2c3d28b4',
        'client_id' => 'testclient',
        'client_secret' => '123456'
    ];
    */
    public function actionRefreshToken()
    {
        $server = $this->refresh_token_server();
        $server->handleTokenRequest(\OAuth2\Request::createFromGlobals())->send();
        exit();
    }


}
