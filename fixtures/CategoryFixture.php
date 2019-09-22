<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class CategoryFixture extends ActiveFixture
{
    public $modelClass = 'app\models\shop\models\Category';
    public $dataFile = '@app/fixtures/data/category.php';
} 