<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServicesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="services-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
        ]); ?>

        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_service') ?>

    <?= $form->field($model, 'meta_key') ?>

    <?= $form->field($model, 'meta_desk') ?>

    <?= $form->field($model, 'title_slide') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'img_slide') ?>

    <?php echo $form->field($model, 'link') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'title_page') ?>

    <?php // echo $form->field($model, 'text') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
