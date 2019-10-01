<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Brend */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brend-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php //  $form->field($model, 'parent_bred_id')->textInput() ?>
    
    <?= $form->field($model, 'image')->fileInput()->label('Логотип бренда'); ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
