<?php

namespace app\commands;

use Pheanstalk\Pheanstalk;
use Yii;

class BeanstalkController extends \yii\console\Controller
{

    public function actionIndex()
    {
        $pheanstalk = new Pheanstalk('127.0.0.1','11300');

        while (true) {
            echo '执行---' ;
            $job = $pheanstalk->watch('demo')->reserve();
            $data = $job->getData();
            echo "\t" . date('Y-m-d H:i:s') . "\t" .  $data . PHP_EOL;
            //一般任务被reserve读出后，业务处理完成时应及时进行delete操作，防止重新被放回管道
            $pheanstalk->delete($job);
            error_log($data . PHP_EOL, 3, '/home/vagrant/Code/tmp/cusumer_beanstalk.log');
        }
    }

    public function actionJob()
    {
        $pheanstalk = new Pheanstalk('127.0.0.1','11300');

        $loop = 100;
        \Yii::beginProfile('block1');
        while ($loop > 0) {
            $delay = 60 * mt_rand(1, 5);
            $json = json_encode([
                'time' => date('Y-m-d H:i:s', time()),
                'delay' => $delay,
                'exec_time' => date('Y-m-d H:i:s', time() + $delay),
                'arg1' => 1, 
                'arg2' => 2, 
                'arg3' => 3, 
                ]);
            $pheanstalk->useTube('demo')->put($json, 0 , $delay);
            $loop--;
        }
        \Yii::endProfile('block1');
        print_r(\Yii::getLogger()->getProfiling());
        
    }
}
