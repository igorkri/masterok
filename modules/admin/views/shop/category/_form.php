<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\shop\models\Category;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
    
$data = Category::find()->select(['name', 'id'])->indexBy('id')->column();

?>
<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?php
        echo $form->field($model, 'parent_id')->dropDownList(Category::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => '-']) 
    ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
