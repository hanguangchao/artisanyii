<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;


class RedisController extends Controller
{

    public function actionIndex()
    {
        file_exists('/tmp/Nolock.log') && unlink('/tmp/Nolock.log');
        file_exists('/tmp/Mutex.log') && unlink('/tmp/Mutex.log');
        file_exists('/tmp/Mutex_blocked.log') && unlink('/tmp/Mutex_blocked.log');
        file_exists('/tmp/Mutex_failed.log') && unlink('/tmp/Mutex_failed.log');
        file_exists('/tmp/Watch.log') && unlink('/tmp/Watch.log');
        file_exists('/tmp/test.log') && unlink('/tmp/test.log');
        file_exists('/tmp/test_blocked.log') && unlink('/tmp/test_blocked.log');
        file_exists('/tmp/Watch_blocked.log') && unlink('/tmp/Watch_blocked.log');
        Yii::$app->redis->executeCommand('DEL', ['Nolock', 'Mutex', 'WatchKEY', 'mykey']);
        return 'done';
    }

    public function actionTest()
    {
        echo getmypid();
        $v = Yii::$app->redis->executeCommand('WATCH', ['mykey']);
        var_dump($v);
        $value = Yii::$app->redis->executeCommand('GET', ['mykey']);
        $v = Yii::$app->redis->executeCommand('MULTI');
        var_dump($v);
        $v = Yii::$app->redis->executeCommand('INCR', ['mykey']);
        var_dump($v);
        $v = Yii::$app->redis->executeCommand('EXEC');
        echo "exec";
        var_dump($v);
        if ($v) {
            error_log(sprintf("%s\t%s\n", getmypid(), $v[0]), 3, '/tmp/test.log');
        } else {
            error_log(sprintf("%s\n", getmypid()), 3, '/tmp/test_blocked.log');
        }
        echo "\r\n";
    }

    /**
     * 没有锁定
     * @return [type] [description]
     */
    public function actionNolock()
    {
        $value = Yii::$app->redis->get('Nolock');
        $max = 1000;
        if ($value + 5 < $max) {
            $value += 5;
            Yii::$app->redis->executeCommand('SET', ['Nolock', $value]);
            error_log(sprintf("%s\t%s\n", getmypid(), $value), 3, '/tmp/Nolock.log');
            return $value;
        } else {
            error_log(sprintf("%s\t%s\n", getmypid(), "done"), 3, '/tmp/Nolock.log');
            return "done";
        }
    }


    /**
     * 使用Redis分布式锁
     * @return [type] [description]
     */
    public function actionMutex()
    {

        $mutex = \Yii::createObject([
            'class' => \pastuhov\yii2redismutex\RedisMutex::className(),
            'redis' => Yii::$app->redis,
        ]);

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

    /**
     * 使用Redis乐观锁
     * @return [type] [description]
     */
    public function actionWatch()
    {
        
        Yii::$app->redis->executeCommand('WATCH', ['WatchKEY']);
        $value = Yii::$app->redis->get('WatchKEY');
        $max = 1000;
        if ($value + 5 < $max) {
            $value += 5;
            Yii::$app->redis->executeCommand('MULTI');
            Yii::$app->redis->executeCommand('SET', ['WatchKEY', $value]);
            $v = Yii::$app->redis->executeCommand('EXEC');
            if ($v) {
                error_log(sprintf("%s\t%s\n", getmypid(), $value), 3, '/tmp/Watch.log');
            } else {
                error_log(sprintf("%s\n", getmypid()), 3, '/tmp/Watch_blocked.log');
            }
        }

    }
}
