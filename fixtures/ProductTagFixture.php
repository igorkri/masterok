<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class ProductTagFixture extends ActiveFixture
{
    public $modelClass = 'app\models\shop\models\ProductTag';
    public $dataFile = '@app/fixtures/data/product-tag.php';
} 