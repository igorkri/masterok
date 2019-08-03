<?php
namespace app\controllers;

use app\models\Services;
use yii\web\Controller;

class ElektrikController extends Controller
{
//elektrik
    public function actionIndex()
    {
        $elektrik = \Yii::$app->cache->getOrSet('elektrik', function () {
        return Services::find()->where(['id_service' => 119])->one();
        });
        return $this->render('index', compact('elektrik')
        );
    }
}