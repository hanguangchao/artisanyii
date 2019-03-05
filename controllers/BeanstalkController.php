<?php

namespace app\controllers;

use Pheanstalk\Pheanstalk;
use Yii;

class BeanstalkController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $pheanstalk = new Pheanstalk('127.0.0.1','11300');
        $json = json_encode([
                'time' => date('Y-m-d H:i:s'),
                'arg1' => 1, 
                'arg2' => 2, 
                'arg3' => 3, 
                ]);
        $pheanstalk->useTube('demo')->put($json, 0 , mt_rand(10, 60));
        print_r($pheanstalk->statsTube('demo'));

    }
}
