<?php 

namespace app\components;
use Yii;

class Lock
{
    private $mutexName = 'snowflake:lock';
    private $mutexClass;
    public function __construct()
    {
        $this->mutexClass = \Yii::$app->mutex;
    }

    public function lock()
    {
        return $this->mutexClass->acquire($this->mutexName);
    }

    public function unlock()
    {
        return $this->mutexClass->release($this->mutexName);
    }
}
