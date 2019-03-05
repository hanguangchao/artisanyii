<?php

namespace app\controllers\oauth2;

use Yii;

class ClientController extends \yii\rest\Controller
{
    public function actionCb()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = \OAuth2\Request::createFromGlobals();
        $url = "http://yii.han.cc/oauth2/token";
        $data = [
            'grant_type' => 'authorization_code',
            'code' => $request->query('code'),
            'client_id' => 'testclient',
            'client_secret' => 'testpass',
            'redirect_uri' => 'http://yii.han.cc/oauth2/cb'
        ];
        
        //todo 自定义的处理判断
        $state = $request->query('state');

        
        $client = new \GuzzleHttp\Client();
        $res = $client->request('POST', $url, [
            'http_errors' => false,
            'form_params' => $data,
        ]);
        
        // echo $res->getStatusCode();
        // // 200
        // echo $res->getHeaderLine('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();
        Yii::$app->end();
    }
}
