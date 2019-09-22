<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => ArrayHelper::getValue($model, 'category.name'),
            ],
            'name',
            'content:ntext',
            'price',
            'active:boolean',//да или нет)))
            [
                'label' => 'Tags',
                'value' => implode(', ', ArrayHelper::map($model->tags, 'id', 'name')),
            ],
        ],
    ]) ?>
    
    <p>
        <?= Html::a('Добавить значение', ['shop/values/create', 'product_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query' => $model->getValues()]),
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'attribute' => 'attribute_id',
                'value' => 'attribute0.name',
            ],
            'value',
            [
                
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'shop/values',
                
            ],
        ],
    ]); ?>

</div>
