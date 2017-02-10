<?php
/**
 * 实现接口统一输出JSON
 * 在action中 只需要
 * $this->msg = "";
 * $this->data = "";
 */
namespace app\modules\api\controllers;

use Yii;

class DefaultController extends Controller
{
    /**
     * 测试API
     * GET /api/default/index
     * @return JSON {"errorno":0,"errormsg":"ok","data":{"name":"hanguangchao","city":"beijing"}}
     */
    public function actionIndex()
    {
        $this->code = 0;
        $this->msg = "ok";
        $this->data = [
            'name' => 'hanguangchao',
            'city' => 'beijing',
        ];
    }

    public function actionList()
    {
        $this->code = 0;
        $this->msg = "ok";
        $this->data = [
            ['id' => 1, 'title' => 'title1'],
            ['id' => 2, 'title' => 'title2'],
        ];
    }

    public function actionErr()
    {
        $response = Yii::$app->response;
        $response->format = \yii\web\Response::FORMAT_JSON;

        try {
            throw new \Exception("接口错误", 100);
        } catch (\Exception $e) {
            Yii::$app->response->setStatusCode(400);
            $this->code = $e->getCode();
            $this->msg = $e->getMessage();
        }
    }
}
