<?php

namespace app\modules\shop\controllers;

use app\models\shop\models\Categories;
use app\models\shop\models\Products;
use Yii;


class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $hits = Products::find()->where(['hit' => '1'])->limit(6)->all();
        
//        debug($hits);
        
        return $this->render('index');
    }

}
