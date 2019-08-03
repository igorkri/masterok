<?php

namespace app\controllers;

use app\models\Services;

class ServicesController extends \yii\web\Controller
{

//
    public function actionHome()
    {
        $services = \Yii::$app->cache->getOrSet('home', function () {
        return Services::find()->where(['id_service' => 1])->one();
        });
        return $this->render('__view', ['services' => $services,]);
    }


    public function actionMicrowave()
     {

         $services = \Yii::$app->cache->getOrSet('microwave', function () {
          return Services::find()->where(['id_service' => 2])->one();
//        $services = Services::find()->where(['id_service' => 2])->one();

         });

        return $this->render('__view', [
                'services' => $services,
            ]
        );
    }



    public function actionExtract()
    {

         $services = \Yii::$app->cache->getOrSet('extract', function () {
             return Services::find()->where(['id_service' => 3])->one();

        });

        return $this->render('__view', [
                'services' => $services,
            ]
        );
    }

       public function actionHoover()
    {
        $services = \Yii::$app->cache->getOrSet('hoover', function () {
            return Services::find()->where(['id_service' => 4])->one();
        });
        return $this->render('__view', [
                'services' => $services,
            ]
        );
    }

       public function actionIron()
    {
        $services = \Yii::$app->cache->getOrSet('iron', function () {
            return Services::find()->where(['id_service' => 5])->one();
        });
        return $this->render('__view', [
                'services' => $services,
            ]
        );
    }

           public function actionCombine()
    {
        $services = \Yii::$app->cache->getOrSet('combine', function () {
            return Services::find()->where(['id_service' => 6])->one();
        });
        return $this->render('__view', [
                'services' => $services,
            ]
        );
    }

    //mincer

           public function actionMincer()
    {
        $services = \Yii::$app->cache->getOrSet('mincer', function () {
            return Services::find()->where(['id_service' => 7])->one();
        });
        return $this->render('__view', [
                'services' => $services,
            ]
        );
    }

//    multicooker

    public function actionMulticooker()
    {
        $services = \Yii::$app->cache->getOrSet('multicooker', function () {
        return Services::find()->where(['id_service' => 8])->one();
        });
        return $this->render('__view', compact('services')
        );
    }
    
    //fridge
    
     public function actionFridge()
    {
        $services = \Yii::$app->cache->getOrSet('fridge', function () {
        return Services::find()->where(['id_service' => 10])->one();
        });
        return $this->render('__view', compact('services')
        );
    }
    //Увлажнитель
     public function actionHumidifier()
    {
        $services = \Yii::$app->cache->getOrSet('humidifier', function () {
        return Services::find()->where(['id_service' => 11])->one();
        });
        return $this->render('__view', compact('services')
        );
    }

// электро поверхности
    public function actionStoveElectro()
    {
        $services = \Yii::$app->cache->getOrSet('stove-electro', function () {
        return Services::find()->where(['id_service' => 15])->one();
        });
        return $this->render('__view', compact('services')
        );
    }
// газовые поверхности
    public function actionStoveGas()
    {
        $services = \Yii::$app->cache->getOrSet('stove-gas', function () {
        return Services::find()->where(['id_service' => 13])->one();
        });
        return $this->render('__view', compact('services')
        );
    }
//Индукция
    public function actionStoveInd()
    {
        $services = \Yii::$app->cache->getOrSet('stove-ind', function () {
        return Services::find()->where(['id_service' => 14])->one();
        });
        return $this->render('__view', compact('services')
        );
    }


//Духовки электро
    public function actionOvenElectro()
    {
        $services = \Yii::$app->cache->getOrSet('oven-electro', function () {
        return Services::find()->where(['id_service' => 16])->one();
        });
        return $this->render('__view', compact('services')
        );
    }

    //Духовки газ
    public function actionOvenGas()
    {
        $services = \Yii::$app->cache->getOrSet('oven-gas', function () {
        return Services::find()->where(['id_service' => 17])->one();
        });
        return $this->render('__view', compact('services')
        );
    }


}
