<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\shop\models\Category;
use kartik\select2\Select2;
use app\models\shop\models\Brend;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$data = Category::find()->select(['name', 'id'])->all();

//$brend = Brend::find()->select(['name', 'id'])->indexBy('id')->column();

//debug($data);die();

?>

<p>
        <?= Html::a('Просмотр', ['view', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Новый товар', ['create', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Все товари', ['index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
</p>


<div class="product-form">
    <div class="col col-lg-6">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

   <?php
    echo $form->field($model, 'category_id')->dropDownList(Category::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => 'Выбрать категорию...']);
    ?> 
    
    <?php
    echo $form->field($model, 'parent_bred_id')->dropDownList(Brend::find()->select(['name', 'id'])->indexBy('id')->column(), ['prompt' => 'Выбрать бренд...']);
    ?> 
    
    <?= $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>

    
    <?= $form->field($model, 'new_price')->textInput(['maxlength' => 19]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => 19]) ?>
    </div>
    <div class="col col-lg-6">
    <?= $form->field($model, 'active')->checkbox([ 'value' => '1', 'checked ' => true])->label(''); ?>
            
    <?= $form->field($model, 'hit')->checkbox([ 'value' => '1', 'checked ' => false]); ?>
            
    <?= $form->field($model, 'sale')->checkbox([ 'value' => '1', 'checked ' => false]); ?>
            
    <?= $form->field($model, 'new')->checkbox([ 'value' => '1', 'checked ' => false]); ?>
            
    <?= $form->field($model, 'status')->checkbox([ 'value' => '1', 'checked ' => true]); ?>
            
    <?= $form->field($model, 'original')->checkbox([ 'value' => '1', 'checked ' => false]); ?>
    
    </div>   
    <div class="row">
        <div class="col col-lg-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'content')->label('Описание товара:')->textInput(['placeholder' => 'Описание товара:'])->widget(CKEditor::class,[
                                    'editorOptions' => [
                                        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                                        'inline' => FALSE, //по умолчанию false
                                    ],
                                ]); ?>
           
        </div>

        <div class="col col-lg-12">
            <?= $form->field($model, 'compatible')->label('Таблица совместимости с моделями:')->textInput(['placeholder' => 'Таблица совместимости с моделями:'])->widget(CKEditor::class,[
                'editorOptions' => [
                    'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                    'inline' => false, //по умолчанию false
                  
                ],
            ]); ?>

            <?= $form->field($model, 'image')->fileInput()->label('Главное изображение'); ?>

            <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label('Другие изображения') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
