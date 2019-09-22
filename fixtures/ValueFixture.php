<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class ValueFixture extends ActiveFixture
{
    public $modelClass = 'app\models\shop\models\Value';
    public $dataFile = '@app/fixtures/data/value.php';
} 