<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
//use kartik\datetime\DatePicker;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\CustomerRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-record-form">
<hr>
<?php //$form = ActiveForm::begin(); ?>
    <?php    
        $form = ActiveForm::begin([
        'id' => 'login-form-inline', 
        'type' => ActiveForm::TYPE_INLINE,
        'fieldConfig' => ['options' => ['class' => 'form-group mr-2']] // spacing form field groups
    ]); 
    
    
    ?>
<table class="table table-striped">
<tr class="">
    <th><em>Дата</em></th>
    <th><em>Акт №</em></th>
    <th><em>Телефон</em></th>
    <th><em>Цена</em></th>
</tr>
<tr>
    <th>
    <?= $form->field($model, 'created_at')->widget(DatePicker::class,[
        'model' => $model,
        'attribute' => 'created_at',
        'name' => 'Дата',
        'options' => ['placeholder' => 'Выберете дату'],
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'autoclose' => true,
            'todayBtn' => true,
            'todayHighlight' => true
        ]
    ]);
    ?>
    </th>
    <th>
    <?= $form->field($model, 'akt')->textInput() ?> 
    </th>
    <th>
    <?= $form->field($model, 'phone')->widget(MaskedInput::class, [
            'mask' => '+38(999)999-99-99',
    ])->textInput() ?>
    </th>
    <th>
    <?= $form->field($model, 'price')->textInput() ?>
    </th>
</tr>
<tr>
    <th><em>Цена материалла</em></th>
    <th><em>Гарантия</em></th>
    <th><em>Какой статус</em></th>
    <th><em>Что отремонтировано</em></th>
    <!--<th><em>Цена</em></th>-->
</tr>
<tr>
    <th>
        <?= $form->field($model, 'material_price')->textInput() ?>
    </th>
    <th>   
        <?= $form->field($model, 'guarantee')->textInput() ?>
    </th>
    <th>    
        <?= $form->field($model, 'status')->dropDownList(\app\helpers\PostHelper::statusList()) ?>
    </th>
    <td>
        <?= $form->field($model, 'repairs')->textInput(['maxlength' => true, 'style' => 'width:100%; margin:5px auto; font-size:18px; color:#000']) ?>
    </td>    
</tr>
  
<tr>
    <th>
        <em>Бытовая техника</em>
    </th>
    <th>
        <em>Поломка техники</em>
    </th>
</tr>
<tr>
    <th>
        <?= $form->field($model, 'appliances')->textInput(['maxlength' => true, 'style' => 'width:100%; margin:5px auto; font-size:18px; color:#000;']) ?>
    </th>

    <th>
        <?= $form->field($model, 'comment')->textInput(['maxlength' => true, 'style' => 'width:100%; margin:5px auto; font-size:18px; color:#000;']) ?>
    </th>
</tr>

    <?php ActiveForm::end(); ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить в базу данных', ['class' => 'btn btn-success']) . '<hr>'?>
    </div>
</table>  
</div>
