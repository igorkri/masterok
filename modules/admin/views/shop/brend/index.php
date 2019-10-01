<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\shop\search\BrendSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brends';
$this->params['breadcrumbs'][] = $this->title;

//debug($searchModel); die;

//$img = $model->getImage();



?>
<div class="brend-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Brend', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
//            'parent_bred_id',
//            [
//                'attribute' => 'image',
//                'label' => 'Главное фото',
//                'value' => "<img src='{$img->getUrl()}'>",
//                'format' => 'raw',
//                        
//            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
