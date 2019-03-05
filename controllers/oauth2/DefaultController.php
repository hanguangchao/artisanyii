<?php

namespace app\controllers\oauth2;

use Yii;

class DefaultController extends \yii\web\Controller
{
    public function init()
    {}

    public function actionIndex()
    {
        return $this->render('index', []);
    }
}
