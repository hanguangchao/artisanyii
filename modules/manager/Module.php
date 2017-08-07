<?php

namespace app\modules\manager;

/**
 * manager module definition class
 */
class Module extends \yii\base\Module
{
    public $layout = '@app/views/layouts/backend';

    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\manager\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
