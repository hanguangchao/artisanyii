<?php

namespace app\controllers;

use Yii;

use app\controllers\Controller;
use app\components\Snowflake;

class IdController extends Controller
{
   
    public function actionIndex()
    {
        $s = new Snowflake(0);
        echo $s->getId();
    }

    public function actionTest()
    {
        $i = 100;
        $s = new Snowflake(0);
        $x = $y = 0;
        while ($i > 0) {
            echo ('currentID:' . $y . '----');
            $id = $s->getId();
            $x = $id;

            //echo $x . PHP_EOL;
            //$ss = str_pad(decbin($x), 64, 0, STR_PAD_LEFT);
            //echo $ss . PHP_EOL;
            //echo sprintf("%s\t%s\t%s\t%s\n", substr($ss, 0, 1), substr($ss, 1, 41), substr($ss, 42, 10), substr($ss, 51, 12));


            echo ('nextId:'. $x) . PHP_EOL;
            if ($y == $x) {
                exit("ERROR");
            }
            $y = $x;
            
            $i--;
        }
    }

    public function actionLock()
    {
        $mutex = Yii::$app->mutex;
        $mutexName = 'lock';
        $value = Yii::$app->redis->get('Mutex');
        $max = 1000;
        if ($mutex->acquire($mutexName)) {
            if ($value + 5 < $max) {
                $value += 5;
                $v = Yii::$app->redis->executeCommand('SET', ['Mutex', $value]);
                var_dump($v);
                if ($v) {
                    error_log(sprintf("%s\t%s\n", getmypid(), $value), 3, '/tmp/Mutex.log');
                    return $value;
                } else {
                    error_log(sprintf("%s\n", getmypid()), 3, '/tmp/Mutex_failed.log'); 
                }
            }
            $mutex->release($mutexName);
        } else {
            error_log(sprintf("%s\t%s\n", getmypid(), "done"), 3, '/tmp/Mutex_blocked.log');
            return 'done';
        }
    }
}
