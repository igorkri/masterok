<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\shop\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    
    <?php $img = $model->getImage();?>
    
    <?php
        $gallery = $model->getImages();
        // print_r($gallery );
    ?>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'category_id',
                'value' => ArrayHelper::getValue($model, 'category.name'),
            ],
            'name',
            'content:ntext',
            'price',
            'active:boolean',//да или нет)))
            'hit:boolean',
            'sale:boolean',
            'new:boolean',
            [
                'attribute' => 'image',
                'label' => 'Главное фото',
                'value' => "<img src='{$img->getUrl('200x200')}'>",
                'format' => 'raw',
                        
            ],
                              
            [
                'label' => 'Tags',
                'value' => implode(', ', ArrayHelper::map($model->tags, 'id', 'name')),
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

    
    <p>
        <?= Html::a('Добавить значение', ['shop/values/create', 'product_id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => new ActiveDataProvider(['query' => $model->getValues()]),
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'attribute' => 'attribute_id',
                'value' => 'attribute0.name',
            ],
            'value',
            [
                
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'shop/values',
                
            ],
        ],
    ]); ?>

</div>
