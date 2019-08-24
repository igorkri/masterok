<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
//use \yii\helpers\Url;

/**
 * use app\models\CustomerRecord;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

 */
/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Главная бытовой техники';
$this->params['breadcrumbs'][] = $this->title;

?>



<div class="customer-record-index">

    <?php Pjax::begin(); ?>
    <p>
        <?= Html::a('Добавить бытовую техники', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//            [
//            'attribute'=>'id',
//            'options' => ['width' => '20'],
//            ],
//              [
//                'attribute' => 'phone',
//                'format' => 'raw',
//                'value' => function($model){
//                    return Html::a($model->phone,['update']);
//                },
//
//            ],
            [
                'attribute'=>'created_at',
                'options' => ['width' => '160'],
//                'format' =>  ['date', 'php:d.M'],
            ],
            [
                'label' => 'Акт',
                'attribute'=>'akt',
                'options' => ['width' => '80'],
            ],
            [
                'attribute'=>'appliances',
                'options' => ['width' => '450'],
            ],
            [
                'attribute'=>'phone',
                'options' => ['width' => '250'],
            ],
//            [
//           'label'=>'bla',
//           'format' => 'raw',
//                'value'=>function ($data) {
////                     return Html::url('site/index');
//                    return Html::a('Позвонить', ['tel:', $data->phone]);
//                 },
//             ],
//            [
//                'label'=>'Гар',
//                'attribute'=>'guarantee',
//                'options' => ['width' => '10'],
//            ],
//            'sn_model',
//            [
//                'attribute'=>'repairs',
//                'options' => ['width' => '400'],
//            ],
//            [
//                'label' => 'Матер.',
//                'attribute'=>'material_price',
//                'options' => ['width' => '50'],
//
//            ],
//            [
//                'attribute'=>'price',
//                'options' => ['width' => '80'],
//            ],


//            [
//                'label' => 'Работа.',
//                'attribute'=>'repairs_price',
//                'options' => ['width' => '50'],
//                'value' => function($data){
//                    $result = $data->price - $data->material_price;
//                    return $result;
//                }
//            ],
            [
                'attribute' => 'status',
                'options' => ['width' => '20'],
                'filter' => \app\helpers\PostHelper::statusList(),
                'value' => function (\app\models\CustomerRecord $model) {
                    return \app\helpers\PostHelper::statusLabel($model->status);
                },
                'format' => 'raw',
            ],
            //'address',
            //'comment:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

    <?php Pjax::end(); ?>
</div>
