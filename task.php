<?php

$serv = new Swoole\Server("127.0.0.1", 9501);

//设置异步任务的工作进程数量
$serv->set(array('task_worker_num' => 8));

$serv->set([
    'open_length_check'     => 1,
    'package_max_length'    => 2*1024*1024,  //允许包的最大长度2MB
    'package_length_type'   => 'N',   //N：无符号、网络字节序、4字节 (常用)
    'package_length_offset' => 0,     //整个包头加包体计算长度
    'package_body_offset'   =>'4',     //包体从第4字节开始计算长度
    'buffer_output_size'   => 3*1024*1024     //设置输出缓冲区的大小
]);

//此回调函数在worker进程中执行
$serv->on('receive', function($serv, $fd, $from_id, $data) {
    //投递异步任务
    $task_id = $serv->task($data);
    #echo "Dispatch AsyncTask: id=$task_id\n";
    // $serv->send($fd, "分发任务，任务id为$task_id\n");
});

//处理异步任务(此回调函数在task进程中执行)
$serv->on('task', function ($serv, $task_id, $from_id, $data) {
    #echo "New AsyncTask[id=$task_id]".PHP_EOL;
    //返回任务执行的结果
    //echo($data) . PHP_EOL;
    //echo('我是服务端接收到的数据长度为：'.strlen($data));
    //echo PHP_EOL;
    //解包，并且截取数据包
    // $info = unpack('N',$data);
    // var_dump($info);
    $data = substr($data,4);
    $row = json_decode($data, true);
    if (is_array($row)) {
        $serv->finish(sprintf("%s -> OK", $row['id']));
    }else {
        $serv->finish("$data -> OK");
    }
    
    
});

//处理异步任务的结果(此回调函数在worker进程中执行)
$serv->on('finish', function ($serv, $task_id, $data) {
    // echo "AsyncTask[$task_id] Finish: $data".PHP_EOL;
    //echo "AsyncTask[$task_id] Finish".PHP_EOL;
});

$serv->start();