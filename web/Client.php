<?php
namespace  HelloThrift\php;

error_reporting(E_ALL);
require_once __DIR__.'/lib/php/lib/Thrift/ClassLoader/ThriftClassLoader.php';
use Thrift\ClassLoader\ThriftClassLoader;

$GEN_DIR = realpath(dirname(__FILE__)).'/gen-php';
$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift',__DIR__.'/lib/php/lib');
$loader->registerDefinition('HelloThrift',$GEN_DIR);
$loader->register();

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TSocket;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Exception\TException;

try {
    $socket = new TSocket('192.168.10.10',9090);
    // if (array_search('--http',$argv)) {
    //     $socket = new THttpClient('192.168.10.10',8080,'/Server.php');
    // } else {
    //     $socket = new TSocket('192.168.10.10',9090);
    // }
    $transport = new TBufferedTransport($socket,1024,1024);
    $protocol  = new TBinaryProtocol($transport);
    $client = new \HelloThrift\HelloServiceClient($protocol);

    $transport->open();

    echo $client->sayHello(" World! ");

    $transport->close();
} catch (\Exception $e) {
    print 'TException:'.$e->getMessage().PHP_EOL;
}
