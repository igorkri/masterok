<?php

namespace app\modules\shop\controllers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author oem
 */
class HomeController extends AppController {
    //put your code here
    
        public function actionIndex()
    {
            
            
//        $services = \Yii::$app->cache->getOrSet('index', function () {
//            $services = Services::find()->where(['id_service' => 1])->one();
//        });
        return $this->render('index');
    }
    
}
