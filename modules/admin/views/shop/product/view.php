<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Продукты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h6 style="color: black; margin: 0 auto;"><?= Html::encode($this->title) ?></h6>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
    
    <?php
    $img = $model->getImage();
    $gallery = $model->getImages();
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'category_id',
            [
                'attribute' => 'category_id',
                'value' => ArrayHelper::getValue($model, 'category.name'),
            ],
            [
                'attribute' => 'parent_bred_id',
                'value' => ArrayHelper::getValue($model, 'brend.name'),
            ],
            'sku',
            'name',
//            'content:ntext',
            'price',
            'active:boolean',
            'hit:boolean',
            'sale:boolean',
            'new:boolean',
            'status:boolean',
            'original:boolean',
            [
            'attribute' => 'compatible',
            'format' => 'raw',
            ],
            [
                'attribute' => 'image',
                'label' => 'Главное фото',
                'value' => "<img src='{$img->getUrl('200x200')}'>",
                'format' => 'raw',
                        
            ],
        ],
    ]) ?>

     <?php

    $img_str=''; 
    echo ' <div class="row">';
          foreach($gallery as $img_g){  	
                  $url_delete=Url::toRoute(['reshenie/deleteimg', 'id_reshenie' => $model->id, 'id_img' => $img_g->id]); //настройка роутера на нужный урл
           $img_str.='		
                  <div class="col-xs-6 col-md-2">
                  <div  class="thumbnail reshenie_image_form">
                  <a class="btn delete_reshenie_img" title="Удалить?" href="'.$url_delete.'" data-id="'.$img_g->id.'"><span class="glyphicon glyphicon-remove"></span></a> 
                  <a class="fancybox img-rounded" rel="gallery1" href="'. $img_g->getUrl().'">'.Html::img($img_g->getUrl('200x200'), ['alt' => '']).'</a>
                  </div>
                  </div> '; 
          }	
          echo $img_str;
          echo '</div>';
    ?>
    
</div>
