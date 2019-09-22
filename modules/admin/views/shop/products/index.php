<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\shop\models\Category;
use app\models\shop\models\Product;
use app\models\shop\models\Tag;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\shop\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
         'columns' => [

            'id',
            [
                'attribute' => 'category_id',
                'filter' => Category::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => 'category.name',
            ],
            'name',
            'content:ntext',
            'price',
            [
                'label' => 'Tags',
                'attribute' => 'tag_id',
                'filter' => Tag::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => function (Product $product) {
                        return implode(', ', ArrayHelper::map($product->tags, 'id', 'name'));
                    },
            ],
            [
                'attribute' => 'active',
                'filter' => [0 => 'Нет', 1 => 'Да'],
                'format' => 'boolean',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
