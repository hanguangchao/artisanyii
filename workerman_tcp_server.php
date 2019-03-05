<?php

// error_reporting(E_ALL);
// ini_set('display_errors', true);


//sigkill
//ps aux|grep WorkerMan|awk '{print $2}'|xargs kill -9

require dirname(__FILE__) . '/vendor/autoload.php';

use Workerman\Worker;

// Worker::$pidFile = dirname(__FILE__) . '/workerman_tcp_server.pid';
// Worker::$stdoutFile = __DIR__ . '/worker.log';

$tcp_worker = new Worker("tcp://0.0.0.0:1234");

// 4 processes
$tcp_worker->count = 1;

// Emitted when new connection come
$tcp_worker->onConnect = function($connection)
{
    echo "New Connection\n";
};

// Emitted when data received
$tcp_worker->onMessage = function($connection, $data)
{
    // send data to client
    $connection->send("hello $data \n");
};

// Emitted when new connection come
$tcp_worker->onClose = function($connection)
{
    echo "Connection closed\n";
};

Worker::runAll();
