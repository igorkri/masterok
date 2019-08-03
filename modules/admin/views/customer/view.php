<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerRecord */

$this->title = $model->appliances ." | ". $model->phone;
$this->params['breadcrumbs'][] = ['label' => 'Customer Records', 'url' => ['/admin/customer/index?sort=-akt']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-record-view">

    <h3 class="adm-h3"><?= Html::encode($this->title) ?></h3>

    <p class="adm-btn">
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Создать', ['create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <button type="button" class="btn btn-info">
            <a href="/admin/customer/index?sort=-akt" style="color: white">На главную</a>
        </button>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
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
//            'id',
            'created_at',
            'akt',
            'appliances',
            'repairs',
            'price',
            'guarantee',
            'phone',
            'material_price',
//            'repairs_price',
             [
                'attribute'=>'repairs_price',
                'options' => ['width' => '50'],
                'value' => function($data){
                    $result = $data->price - $data->material_price;
                    return $result;
                }
            ],
//            'status',
            [
                'attribute' => 'status',
                'options' => ['width' => '20'],
                'filter' => \app\helpers\PostHelper::statusList(),
                'value' => function (\app\models\CustomerRecord $model) {
                    return \app\helpers\PostHelper::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            'sn_model',
            'address',
            'comment:ntext',
        ],
        'options' => [
            'class' => ['adm-table table table-striped']
        ],
        'template' => '<tr style="font-size: 18px"><th style="width:40%; text-align: right;">{label}: </th><td style="width:60%;">{value}</td></tr>',
    ]) ?>

</div>
