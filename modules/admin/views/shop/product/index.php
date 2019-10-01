<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\shop\models\Category;
use app\models\shop\models\Product;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\shop\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
//     $img = $model->getImage();
    
// echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>  
    </p>
    <?php
    
//foreach ($images_photos as $photo){
//    $mainImg = $photo->getImage();
//    
//    echo "<img src='{$mainImg->getUrl('80x80')}'>";
//    
////    echo yii\helpers\Html::img($mainImg->getUrl('80x80'), ['alt'=> $photo['name']]);
//}
    
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          
            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return empty($model->category_id) ? '-' : $model->category->name;
                },
            ],
            [
                'attribute' => 'parent_bred_id',
                'filter' => app\models\shop\models\Brend::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'brend.name',
            ],
            'sku',
            'name',
//            'content:ntext',
            'price',
            //'active',
            //'hit',
            //'sale',
            //'new',
//            'status',
            [
                'attribute' => 'status',
                'filter' => [0 => 'Нет', 1 => 'Да'],
                'format' => 'boolean',
            ],
            //'original',
            //'compatible:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
