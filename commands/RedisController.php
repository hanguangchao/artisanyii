<?php
namespace app\commands;

use Yii;
use yii\caching\TagDependency;

class RedisController extends \yii\console\Controller
{
    public function actionRun()
    {
        Yii::$app->cache->set('user_42_stats', mt_rand(1,1000), 1000, new TagDependency(['tags' => 'user-123']));
        Yii::$app->cache->set('user_42_stats1', mt_rand(1,1000), 1000, new TagDependency(['tags' => 'user-123']));

        // TagDependency::invalidate(Yii::$app->cache, ['user-123',]);

        $v = Yii::$app->cache->get('user_42_stats');
        var_dump($v);

    }
}