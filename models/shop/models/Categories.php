<?php

namespace app\models\shop\models;

use app\models\shop\models\Products;
use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string $remark
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer', 'max' => 5],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['remark'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'parent_id',
            'name' => 'Название кат.',
            'remark' => 'Описание',
        ];
    }
    
    public function getProducts(){
        return $this->hasMany(Products::className(), ['category_id' => 'id']);

    }
}
