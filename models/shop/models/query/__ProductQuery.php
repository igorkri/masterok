<?php

namespace app\models\shop\models\query;

/**
 * This is the ActiveQuery class for [[\app\models\shop\models\Product]].
 *
 * @see \app\models\shop\models\Product
 */
class ProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \app\models\shop\models\Product[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\shop\models\Product|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
