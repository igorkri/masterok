<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\shop\models\Categories;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin([
        
        'fieldConfig' => [
                'options' => [
                    'class' => 'form-row'
                ]
            ]
    ]); ?>
<div class="form-group col-md-4">
    <?= $form->field($model, 'category_id')->label(false)->textInput(['placeholder' => 'Выберете категорию:'])->dropDownList(\yii\helpers\ArrayHelper::map(Categories::find()->all(), 'id', 'name')); ?>
</div>
<div class="form-group col-md-4">
    <?= $form->field($model, 'sku', ['options' => ['class' => '']])->label(false)->textInput(['placeholder' => 'Артикул:'])?>
</div>
    
<div class="form-group col-md-2">
    <?= $form->field($model, 'price', ['options' => ['class' => '']])->label(false)->textInput(['placeholder' => 'Цена:']) ?>
</div>
    
<div class="form-group col-md-2">
    <?= $form->field($model, 'price_sale', ['options' => ['class' => '']])->label(false)->textInput(['placeholder' => 'Цена распродажи:']) ?>
</div>
    
<div class="form-group col-md-12">
    <?= $form->field($model, 'name', ['options' => ['class' => '']])->label(false)->textInput(['placeholder' => 'Название *:']) ?>
</div>

<div class="form-group col-md-6">   
    <?= $form->field($model, 'keywords', ['options' => ['class' => '']])->label(false)->textInput(['placeholder' => 'Ключевые слова SEO *:']) ?>
</div>
<div class="form-group col-md-6">
    <?= $form->field($model, 'description', ['options' => ['class' => '']])->label(false)->textInput(['placeholder' => 'Описание SEO *:']) ?>
</div>
    <p>Полное описание:</p>
<div class="form-group col-md-12>    
<?= $form->field($model, 'content')->label(false)->textInput(['placeholder' => 'Ваше сообщение *:'])->widget(CKEditor::class,[
    'editorOptions' => [
        'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
    ],
]); ?>
</div> 

    <?php // $form->field($model, 'content')->textarea(['rows' => 6]) ?>
</div>
    <?= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <div class="form-check-inline">
        <?= $form->field($model, 'hit')->checkbox([ '0' => 'Нет', '1' => 'Да', ]) ?>
    </div>
    
    <div class="form-check-inline">
        <?= $form->field($model, 'new')->checkbox([ '0' => 'Нет', '1' => 'Да', ]) ?>
    </div>
    <div class="form-check-inline">
        <?= $form->field($model, 'sale')->checkbox([ '0' => 'Нет', '1' => 'Да', ]) ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
