<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\shop\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
            'attribute'=>'category_id',
//            'filter' => \app\models\shop\models\Categories::find()->select(['name', 'id'])->indexBy('id')->column(),
            'value' => \yii\helpers\ArrayHelper::getValue($model, 'category.name'),
            ],
            'name',
            'content:ntext',
            'price',
            'keywords',
            'description',
            'img',
            'hit',
            'new',
            'sale',
        ],
    ]) ?>

</div>
