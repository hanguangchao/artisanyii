<?php
namespace app\controllers;
use Yii;


class CachingController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            [
                'class' => 'yii\filters\PageCache',
                'only' => ['caching-page'],
                'duration' => 60,
                'variations' => [
                    \Yii::$app->language,
                ],
                'dependency' => [
                    'class' => 'yii\caching\DbDependency',
                    'sql' => 'SELECT COUNT(*) FROM post',
                ],
                'enabled' => 1 == Yii::$app->request->get('enabled', 0),
            ],
            [
                'class' => 'yii\filters\HttpCache',
                'only' => ['caching-http'],
                'lastModified' => function ($action, $params) {
                    $q = new \yii\db\Query();
                    return $q->from('post')->max('updated_at');
                },
                'cacheControlHeader' => 'public, max-age=3600000',
            ],
        ];
    }
    public function actionIndex()
    {
    }
    
    /**
     * 数据缓存
     */ 
    public function actionDataCache()
    {

        $db = Yii::$app->db;
        //缓存一分钟
        //依赖更新时间
        //依赖项有变化，在获取缓存时会会判断为缓存失效，重新设置缓存
        $duration = 600;
        $dependency = new \yii\caching\DbDependency([
            'db' => $db,
            'params' => [':id' => 1],
            'sql' => 'SELECT updated_at FROM customer WHERE id=:id',
        ]);
        $result = $db->cache(function ($db) {
            // the result of the SQL query will be served from the cache
            // if query caching is enabled and the query result is found in the cache
            return $db->createCommand('SELECT * FROM customer WHERE id = 1')->queryOne();
        }, $duration, $dependency);
        
        return $this->render('datacache', [
            'result' => $result,
        ]);
    }
    
    /**
     * 片段缓存
     */
    public function actionCachingFragment()
    {
        return $this->render('caching-fragment', [
             
        ]); 
    }
    
    /**
     * 页面缓存
     * 页面缓存指的是在服务器端缓存整个页面的内容。 随后当同一个页面被请求时，内容将从缓存中取出，而不是重新生成。
     * 页面缓存由 yii\filters\PageCache 类提供支持，该类是一个过滤器。 
     */
    public function actionCachingPage()
    {
        return $this->render('caching-page', []);
    }

    public function actionCachingHttp()
    {   
        return $this->render('caching-http', []);
    }
}
