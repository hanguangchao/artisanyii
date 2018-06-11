<?php 

require __DIR__ . '/../vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;


$connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();
echo " [*] Waiting for messages. To exit press CTRL+C\n";

$callback = function ($msg) {
echo ' [x] Received ', $msg->body, "\n";
sleep(substr_count($msg->body, '.'));
    echo " [x] Done\n";
};

$channel->basic_consume('hello', '', false, true, false, false, $callback);
while (count($channel->callbacks)) {
    $channel->wait();
}
