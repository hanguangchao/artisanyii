<?php
/**
 * api模块控制器基类
 * 实现定义响应格式 统一为JSON
 * JSON 结构体示例
 * [
 *      "errorno": "",
 *      "errormsg": "",
 *      "data": []
 * ]
 * @author hanguangchao
 */
namespace app\modules\api\controllers;

use Yii;

class Controller extends \yii\web\Controller
{
    public $code = 0;
    public $msg  = 'ok';
    public $data = [];
    /**
     * HTTP Status Code
     * @var integer 200 | 400 | 401 | 403 |500 等
     */
    public $statusCode = 200;

    public function init()
    {
        //API请求 要禁用Csrf验证
        Yii::$app->getRequest()->enableCsrfValidation = false;
    }

    public function beforeAction($action)
    {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;
        if (!parent::beforeAction($action)) {
            return false;
        }
        return true;
    }

    public function afterAction($action, $result)
    {
        Yii::$app->response->data = [
            'errorno' => $this->code,
            'errormsg' => $this->msg,
            'data' => $this->data,
        ];
    }
}
