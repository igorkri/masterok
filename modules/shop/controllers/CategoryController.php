<?php

namespace app\modules\shop\controllers;

use app\models\shop\models\Categories;
use app\models\shop\models\Products;
use Yii;


class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        $hits = Products::find()->where(['hit' => '1'])->asArray()->all();
        $hits = Products::find()->all();
        $sliders = Products::find()->where(['hit' => '1'])->limit(5)->asArray()->all();
        
//        debug($hits);
        
        return $this->render('index', compact('hits', 'sliders'));
    }

}
