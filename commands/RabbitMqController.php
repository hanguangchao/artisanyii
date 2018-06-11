<?php

namespace app\commands;

use Yii;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMqController extends \yii\console\Controller
{
    public function actionIndex($loop = 0)
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->queue_declare('hello', false, false, false, false);
        while ($loop > 0) {
            $msg = new AMQPMessage('Hello World!');
            $channel->basic_publish($msg, '', 'hello');
            echo " [x] Sent 'Hello World!'\n";
            $loop--;
            usleep(500000);
        }
        $channel->close();
        $connection->close();
    }

    public function actionReceive()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('hello', false, false, false, false);

        echo " [*] Waiting for messages. To exit press CTRL+C\n";


        $callback = function ($msg) {
              echo ' [x] Received ', $msg->body, "\n";
        };

        $channel->basic_consume('hello', '', false, true, false, false, $callback);

        while (count($channel->callbacks)) {
                $channel->wait();
        }
    }

    /**
     * 工作队列
     * @return [type] [description]
     */
    public function actionTask($data)
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        //队列声明为持久化,  queue_declare 的第三个参数设置为true
        //设置为 true 的标志需要同时应用于生产者和消费者
        $channel->queue_declare('task_queue', false, true, false, false);

        if (empty($data)) {
            $data = "Hello World!";
        }
        // $msg = new AMQPMessage($data);

        $msg = new AMQPMessage(
            $data,
            array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
        );



        $channel->basic_publish($msg, '', 'task_queue');

        echo ' [x] Sent ', $data, "\n";
        $channel->close();
        $connection->close();
    }

    public function actionWorker()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->queue_declare('task_queue', false, true, false, false);

        list($queue_name, ,) = $channel->queue_declare("");

        echo " [*] Waiting for messages. To exit press CTRL+C\n";

        $callback = function ($msg) {
        echo ' [x] Received ', $msg->body, "\n";
            sleep(substr_count($msg->body, '.'));
            echo " [x] Done\n";
            $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
        };

        //们可以通过设置 basic_qos 第二个参数 prefetch_count = 1。这一项告诉RabbitMQ不要一次给一个消费者发送多个消息。
        //或者换一种说法，在确认前一个消息之前，不要向消费者发送新的消息。
        //相反，新的消息将发送到一个处于空闲的消费者。
        $channel->basic_qos(null, 1, null);

        $channel->basic_consume('task_queue', '', false, false, false, false, $callback);

        while (count($channel->callbacks)) {
                $channel->wait();
        }
        $channel->close();
        $connection->close();

    }

    /**
     * 消费日志
     * @return [type] [description]
     */
    public function actionReceiveLogs()
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->exchange_declare('logs', 'fanout', false, false, false);

        list($queue_name, ,) = $channel->queue_declare("", false, false, true, false);
        
        $channel->queue_bind($queue_name, 'logs');
        
        echo " [*] Waiting for logs. To exit press CTRL+C\n";
        
        $callback = function ($msg) {
            echo ' [x] ', $msg->body, "\n";
        };
        $channel->basic_consume($queue_name, '', false, true, false, false, $callback);
        
        while (count($channel->callbacks)) {
            $channel->wait();
        }
        
        $channel->close();
        $connection->close();

    }

    /**
     * 生产日志
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function actionEmitLog($data, $loop = 0)
    {
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();

        $channel->exchange_declare('logs', 'fanout', false, false, false);
        
        if (empty($data)) {
            $data = "info: Hello World!";
        }
        
        $msg = new AMQPMessage($data);
        while ($loop >= 0) {
            $channel->basic_publish($msg, 'logs');
            echo ' [x] Sent ', $data, "\n";
            $loop--;
        }
        
        $channel->close();
        $connection->close();
    }


    /**
     * 直接交换 (Direct exchange)
     * @return [type] [description]
     */
    public function actionEmitLogDirect()
    {
        $argv = array_slice($_SERVER['argv'], 1);

        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->exchange_declare('direct_logs', 'direct', false, false, false);

        $severity = isset($argv[1]) && !empty($argv[1]) ? $argv[1] : 'info';
        $data = implode(' ', array_slice($argv, 2));
        if (empty($data)) {
            $data = "Hello World!";
        }

        $msg = new AMQPMessage($data);
        $channel->basic_publish($msg, 'direct_logs', $severity);
        echo ' [x] Sent ', $severity, ':', $data, "\n";
        
        $channel->close();
        $connection->close();
    }

    public function actionReceiveLogsDirect()
    {
        $argv = array_slice($_SERVER['argv'], 1);
        $connection = new AMQPStreamConnection('localhost', 5672, 'guest', 'guest');
        $channel = $connection->channel();
        $channel->exchange_declare('direct_logs', 'direct', false, false, false);
        
        list($queue_name, ,) = $channel->queue_declare("", false, false, true, false);
        $severities = array_slice($argv, 1);
        if (empty($severities)) {
            file_put_contents('php://stderr', "Usage: $argv[0] [info] [warning] [error]\n");
            exit(1);
        }
        foreach ($severities as $severity) {
            $channel->queue_bind($queue_name, 'direct_logs', $severity);
        }

        echo " [*] Waiting for logs. To exit press CTRL+C\n";

        $callback = function ($msg) {
            echo ' [x] ', $msg->delivery_info['routing_key'], ':', $msg->body, "\n";
        };
        $channel->basic_consume($queue_name, '', false, true, false, false, $callback);
        while (count($channel->callbacks)) {
            $channel->wait();
        }

        $channel->close();
        $connection->close();
    }
}
