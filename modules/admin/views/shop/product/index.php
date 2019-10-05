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
//    debug($images_photos);
     $img = $images_photos->getImage();


// echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>  
    </p>
    <?php
    echo '<table class="table table-striped">';
        echo "<tr>";
            echo "<th>Изображение</th>";
            echo "<th>Артикул</th>";
            echo "<th>Название товара</th>";
            echo "<th>Цена</th>";
            echo "<th>Действие</th>";
        echo "</tr>";
        foreach ($images_photos as $product){
            $mainImg = $product->getImage();

                echo "<tr>";
                    echo "<td><img src='{$mainImg->getUrl('80x80')}'></td>";
                    echo "<td>$product->sku</td>";
                    echo "<td>$product->name</td>";
                    echo "<td>$product->price</td>";
                    echo "<td>
                                <a href=\"product/view?id=$product->id\" >
                                    <i class=\"glyphicon glyphicon-eye-open\"></i>
                                </a>
                                <a href=\"product/update?id=$product->id\">
                                    <i class=\"glyphicon glyphicon-pencil\"></i>
                                </a>
                                <a href=\"product/delete?id=$product->id\" onclick=\"return confirm('Действительно удалить?')\">
                                    <i class=\"glyphicon glyphicon-trash\"></i>
                                </a>
                                
                         </td>";
                echo "</tr>";
        }
    echo '</table>';
   $img = $searchModel->getImage();
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
