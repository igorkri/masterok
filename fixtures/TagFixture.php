<?php

namespace app\fixtures;

use yii\test\ActiveFixture;

class TagFixture extends ActiveFixture
{
    public $modelClass = 'app\models\shop\models\Tag';
    public $dataFile = '@app/fixtures/data/tag.php';
} 