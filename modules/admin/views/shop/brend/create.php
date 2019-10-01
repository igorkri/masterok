<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Brend */

$this->title = 'Create Brend';
$this->params['breadcrumbs'][] = ['label' => 'Brends', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brend-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
