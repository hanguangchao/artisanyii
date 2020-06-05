<?php 

namespace app\commands;

use Yii;
use Elasticsearch\ClientBuilder;

class EsController extends \yii\console\Controller
{
    public function actionIndex()
    {
    }

    public function actionDbToEs($table_name = '')
    {
        $db = new \yii\db\Connection([
            'dsn' => 'mysql:host=localhost;dbname=spaceone',
            'username' => 'homestead',
            'password' => 'secret',
            'charset' => 'utf8',
        ]);
        // $db->createCommand();
        // $db->createCommand("SELECT 1")->queryOne();
        // serialize($db);
        // $row = $db->createCommand("SELECT id FROM brand_item LIMIT 1")->queryOne();
        // print_r($row);
        // ->queryOne();
        // var_dump($db);
        // $db->open();
        // $row = $db->createCommand("SHOW CREATE DATABASE spaceone")->queryAll();
        $rows = $db->createCommand("SELECT * FROM brand_item")->queryAll();

        for($i = 0; $i < count($rows); $i++) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'saas',
                    '_type' => 'contract',
                ]
            ];

            $params['body'][] = $rows[$i];
           
        }

        $hosts = [
            '10.211.55.100:9200',
        ];
        $client = ClientBuilder::create()
            ->setHosts($hosts)
            ->build();
        $responses = $client->bulk($params);
        return json_encode($responses);
    }
}
