<?php

namespace app\modules\shop\controllers;

use app\models\shop\models\Category;
use app\models\shop\models\Product;
use app\models\shop\models\Brends;
use Yii;


class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
//        $hits = Products::find()->where(['hit' => '1'])->asArray()->all();
        $categories = Product::find()->all();
//        $hits = Product::find()->where(['hit' => '1'])->limit(5)->asArray()->all();
//        $brends = Brends::find()->select('name')->asArray()->all();
        
//        debug($hits);
        
        return $this->render('index', compact('categories'));
    }

}
