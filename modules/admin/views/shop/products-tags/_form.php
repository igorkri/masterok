<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\shop\models\Product;
use app\models\shop\models\Tag;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\ProductTag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-tag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->dropDownList(Product::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'tag_id')->dropDownList(Tag::find()->select(['name', 'id'])->indexBy('id')->column()) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
