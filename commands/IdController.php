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
class IdController extends Controller
{

    public function actionRun()
    {
        $i = 100;
        $s = new \app\components\Snowflake(0);
        $x = $y = 0;
        while ($i > 0) {
            echo ('currentID:' . $y . '----');
            $id = $s->getId();
            $x = $id;

            //echo $x . PHP_EOL;
            //$ss = str_pad(decbin($x), 64, 0, STR_PAD_LEFT);
            //echo $ss . PHP_EOL;
            //echo sprintf("%s\t%s\t%s\t%s\n", substr($ss, 0, 1), substr($ss, 1, 41), substr($ss, 42, 10), substr($ss, 51, 12));


            echo ('nextId:'. $x) . PHP_EOL;
            if ($y == $x) {
                exit("ERROR");
            }
            $y = $x;
            
            $i--;
        }

    }
}
