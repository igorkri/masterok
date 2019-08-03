<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CustomerRecord */
$inform = \app\models\CustomerRecord::find()->select('akt, appliances, phone, price')->asArray()->all();

foreach ($inform as $info){

}

$this->title = 'Последний акт №: ' . $info['akt'] .' | '.$info['appliances'] .' | Цена: '.$info['price'] .'грн. | '.$info['phone'];
$this->params['breadcrumbs'][] = ['label' => 'Бытовая техника', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-record-create">

    <h3 class="adm-h3"><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
