<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\shop\models\Category;
use app\models\shop\models\Tag;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
<?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->dropDownList(Category::find()->select(['name', 'id'])->indexBy('id')->column()) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'price')->textInput() ?>

            <?= $form->field($model, 'active')->checkbox([ 'value' => '1', 'checked ' => true])->label('Наличие товара'); ?>

            <?= $form->field($model, 'tagsArray')->checkboxList(Tag::find()->select(['name', 'id'])->indexBy('id')->column()) ?>
        </div>
        <div class="col-md-6">
            <?php foreach ($values as $value): ?>
                <?= $form->field($value, '[' . $value->attribute0->id . ']value')->label($value->attribute0->name); ?>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
