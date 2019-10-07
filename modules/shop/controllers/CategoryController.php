<?php

namespace app\modules\shop\controllers;

use app\models\shop\models\Category;
use app\models\shop\models\Product;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController{

    public function actionIndex(){
        $hits = Product::find()->all();
        $this->setMeta('E-SHOPPER');
        $brends = \app\models\shop\models\Brend::find()->all();
        return $this->render('index', compact('hits', 'brends'));
    }

    public function actionView($id){
//        $id = Yii::$app->request->get('id');
        $category = Category::findOne($id);
        if(empty($category))
            throw new \yii\web\HttpException(404, 'Такой категории нет');

//        $products = Product::find()->where(['category_id' => $id])->all();
        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        $brends = \app\models\shop\models\Brend::find()->all();
        $this->setMeta('E-SHOPPER | ' . $category->name, $category->description);
        return $this->render('view', compact('products', 'pages', 'category', 'brends'));
    }

    public function actionSearch(){
        $q = trim(Yii::$app->request->get('q'));
        $this->setMeta('E-SHOPPER | Поиск: ' . $q);
        if(!$q)
            return $this->render('search');
        $query = Product::find()->where(['like', 'name', $q]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('search', compact('products', 'pages', 'q'));
    }

} 