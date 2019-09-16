<?php

namespace app\modules\shop;

/**
 * shop module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     * 
     * 
     */
    
    //public $layout = '/';
    public $layout = '@app/modules/shop/views/layouts/main.php';
    
    public $controllerNamespace = 'app\modules\shop\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
