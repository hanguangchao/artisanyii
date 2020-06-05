<?php

namespace app\commands;

use Yii;
use yii\db\Query;
class BatchController extends \yii\console\Controller
{
    public function actionRun()
    {
     
        $query = new \yii\db\Query();
        $query->from('company')->select('company_id , company_name');


        foreach ($query->batch(100) as $users) {
            
        }
    }
}
