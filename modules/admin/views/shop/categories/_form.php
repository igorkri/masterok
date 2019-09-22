<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\shop\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(Category::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => '']) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
