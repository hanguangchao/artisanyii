<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;

use Elasticsearch\ClientBuilder;

class EsController extends Controller
{
    protected $client;

    public function init()
    {
        $hosts = [
            '10.211.55.100:9200',   
        ];
        $this->client = ClientBuilder::create()
            ->setHosts($hosts)
            ->build();
        parent::init();
    }

    public function actionIndex()
    {
    }

    public function actionDocIndex()
    {
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id',
            'body' => ['testField' => 'abc']
        ];

        $response = $this->client->index($params);
        print_r($response);
    }

    public function actionGetDoc()
    {
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id'
        ];

        $response = $this->client->get($params);
        print_r($response);
    }

    public function actionSearchDoc()
    {
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'body' => [
                'query' => [
                    'match' => [
                        'testField' => 'abc'
                    ]
                ]
            ]
        ];

        $response = $this->client->search($params);
        print_r($response);
    }

    public function  actionDeleteDoc()
    {
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id'
        ];

        $response = $this->client->delete($params);
        print_r($response);
    }

    public function actionDeleteIndex()
    {
        $deleteParams = [
            'index' => 'my_index'
        ];
        $response = $this->client->indices()->delete($deleteParams);
        print_r($response);
    }

    public function actionCreateIndex()
    {
        $params = [
            'index' => 'my_index',
            'body' => [
                'settings' => [
                    'number_of_shards' => 2,
                    'number_of_replicas' => 0
                ]
            ]
        ];

        $response = $client->indices()->create($params);
        print_r($response);
    }

    public function actionIndexGetSettings()    
    {

        $params = ['index' => 'my_index'];
        $response = $this->client->indices()->getSettings($params);
        print_r($response);

        // Get settings for several indices
        // $params = [
        //     'index' => [ 'my_index', 'my_index2' ]
        // ];
        // $response = $this->client->indices()->getSettings($params);
        // print_r($response);
    }

    public function actionGetMappings()
    {
        // Get mappings for all indexes and types
        $response = $this->client->indices()->getMapping();
        print_r($response);

        // Get mappings for all types in 'my_index'
        $params = ['index' => 'my_index'];
        $response = $this->client->indices()->getMapping($params);
        print_r($response);

        // // Get mappings for all types of 'my_type', regardless of index
        // $params = ['type' => 'my_type' ];
        // $response = $client->indices()->getMapping($params);

        // // Get mapping 'my_type' in 'my_index'
        // $params = [
        //     'index' => 'my_index'
        //     'type' => 'my_type'
        // ];
        // $response = $client->indices()->getMapping($params);

        // // Get mappings for two indexes
        // $params = [
        //     'index' => [ 'my_index', 'my_index2' ]
        // ];
        // $response = $client->indices()->getMapping($params);
    }

    public function actionIndexBulk()
    {
        for($i = 0; $i < 100; $i++) {
            $params['body'][] = [
                'index' => [
                    '_index' => 'my_index',
                    '_type' => 'my_type',
                ]
            ];

            $params['body'][] = [
                'my_field' => 'my_value',
                'second_field' => 'some more values'
            ];
        }
        $responses = $this->client->bulk($params);
        return json_encode($responses);
    }

    public function actionDocUpdate()
    {
        $params = [
            'index' => 'my_index',
            'type' => 'my_type',
            'id' => 'my_id',
            'body' => [
                'doc' => [
                    'new_field' => 'abc'
                ]
            ]
        ];

        // Update doc at /my_index/my_type/my_id
        $response = $this->client->update($params);
        return json_encode($response);
    }
}
