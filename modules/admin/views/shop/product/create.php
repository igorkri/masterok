<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Products */

$this->title = Yii::t('app', 'Добавление товара');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <!--<h1><?php // Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
