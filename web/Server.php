<?php
namespace HelloThrift\php;

error_reporting(E_ALL);

require_once __DIR__.'/lib/php/lib/Thrift/ClassLoader/ThriftClassLoader.php';
use Thrift\ClassLoader\ThriftClassLoader;

$GEN_DIR = realpath(dirname(__FILE__)).'/gen-php';
$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift',__DIR__.'/lib/php/lib');
$loader->registerDefinition('HelloThrift',$GEN_DIR);
$loader->register();

if (php_sapi_name() == 'cli') {
    ini_set('display_errors',"stderr");
}

use Thrift\Protocol\TBinaryProtocol;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;
use Thrift\Factory\TTransportFactory;
use Thrift\Factory\TBinaryProtocolFactory;
 
use Thrift\Server\TServerSocket;
use Thrift\Server\TServer;
use Thrift\Server\TSimpleServer;

class HelloHandler implements \HelloThrift\HelloServiceIf {

    public function sayHello($username)
    {
        return "Hello ".$username;
    }
}

header('Content-Type','application/x-thrift');
if (php_sapi_name() == 'cli') {
    echo PHP_EOL;
}

$handler = new HelloHandler();
$processor = new \HelloThrift\HelloServiceProcessor($handler);


/*
$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
$protocol = new TBinaryProtocol($transport,true,true);

$transport->open();
$processor->process($protocol,$protocol);
$transport->close();
*/



$transportFactory = new TTransportFactory();
$protocolFactory = new TBinaryProtocolFactory(true, true);

//作为cli方式运行，非阻塞方式监听，基于libevent实现，非官方实现
$transport = new TServerSocket('192.168.10.10', 9090);
$server = new TSimpleServer($processor, $transport, $transportFactory, $transportFactory, $protocolFactory, $protocolFactory);
$server->serve();
 
    //客户端和服务端在同一个输入输出流上
    //使用方式
    //1) cli 方式：php Client.php | php Server.php 
    //2) cgi 方式：利用Apache或nginx监听http请求，调用php-fpm处理，将请求转换为PHP标准输入输出流
    //$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));
    //$protocol = new TBinaryProtocol($transport, true, true);
    //$transport->open();
    //$processor->process($protocol, $protocol);
    //$transport->close();
