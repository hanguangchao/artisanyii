<?php

namespace app\controllers;

use Yii;

use app\controllers\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Html;

/**
 * DashboardController implements the CRUD actions for User model.
 */
class DashboardController extends Controller
{
    public $layout = '@app/views/layouts/backend.php';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
