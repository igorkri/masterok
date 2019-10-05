<?php

namespace app\modules\shop\controllers;

use app\models\shop\models\Category;
use app\models\shop\models\Product;
use app\models\shop\models\Brend;
use Yii;


class CategoryController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $categories = Product::find()->with('brend')->all();
        $brends = Brend::find()->all();
        
//      $count = Product::find()->where(['parent_bred_id' => 'id'])->all();
        
//        $query1 = Product::find()->where(['parent_bred_id' => 'id'])->joinWith(['brend'])->groupBy('id')->count();
        
//        debug($query1);
        
        return $this->render('index', compact('categories', 'brends'));
    }

    public function actionView($id){
        $id = Yii::$app->request->get('id');
        $products = Product::find()->where(['category_id' => $id])->all();
        return $this->render('view', compact('products'));
    }


}
