<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
    {
        //Yii方式接收参数
        echo $message . "\n";

        try {
            var_dump($argv);
        } catch (\Exception $e) {
            echo $e->getMessage(); //Undefined variable: argv
        }

        //接收原始命令行参数
        global $argv;
        var_dump($argv);
        


        //输入提示符
        $name = \yii\helpers\BaseConsole::input("输入姓名: ");
        $age  = \yii\helpers\BaseConsole::prompt("输入年龄: ", ['default' => 20]);

        if(!$this->confirm("确定输入正确吗?")) {
            exit("退出\n");
        }
        echo "你输入的姓名是:$name\n";
        echo "你输入的年龄是:$age\n";

    }
}
