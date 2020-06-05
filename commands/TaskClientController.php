<?php

namespace app\commands;

use Yii;

class TaskClientController extends \yii\console\Controller
{

    public function actionRun()
    {

        $client = new \Swoole\Client(SWOOLE_SOCK_TCP);
        if (!$client->connect('127.0.0.1', 9501, -1)) {
            exit("connect failed. Error: {$client->errCode}\n");
        }

        $client->set([
            'open_length_check'     => 1,
            'package_max_length'    => 2*1024*1024,  //允许包的最大长度2MB
            'package_length_type'   => 'N',   //N：无符号、网络字节序、4字节 (常用)
            'package_length_offset' => 0,     //整个包头加包体计算长度
            'package_body_offset'   =>'4',     //包体从第4字节开始计算长度
            'socket_buffer_size' => 2* 1024 *1024, //配置客户端连接的缓存区长度
        ]);

        $start = microtime(true);

        $from = 0;
        $pagesize = 1000;
        $to   = $from + $pagesize;
        $list = $this->getPage($from, $to);

        $i = 0;
        while($list) {
            echo sprintf("%s\t%s\n", $from, $to);
            foreach ($list as $row) {
                $i++;
                $body = json_encode($row);
                $data = pack('N',strlen($body)).$body;
                $client->send($data);
                // echo $client->recv();
            }
            usleep(10000);
            $from = $to + 1;
            $to   = $to + $pagesize;
            $list = $this->getPage($from, $to);
        }

        $client->close();

        $end = microtime(true);
        echo ($end - $start) * 1000 . 'ms' . '  '. $i . PHP_EOL;

    }
    private function getPage($from, $to)
    {
        return Yii::$app->db->createCommand("SELECT * FROM `xiaolou_company_search` WHERE id >= '{$from}' AND id <= '{$to}';")->queryAll();
    }





}