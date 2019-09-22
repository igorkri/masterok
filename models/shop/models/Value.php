<?php

namespace app\models\shop\models;

use Yii;

/**
 * This is the model class for table "{{%value}}".
 *
 * @property int $product_id
 * @property int $attribute_id
 * @property string $value
 *
 * @property Attribute $attribute0
 * @property Product $product
 */
class Value extends \yii\db\ActiveRecord
{
    
    const SCENARIO_TABULAR = 'tabular';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%value}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
       
         return [
            [['product_id', 'attribute_id'], 'required'],
            [['value'], 'required', 'except' => self::SCENARIO_TABULAR],
            [['product_id', 'attribute_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => Attribute::className(), 'targetAttribute' => ['attribute_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'attribute_id' => 'Attribute ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttribute0()
    {
        return $this->hasOne(Attribute::className(), ['id' => 'attribute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
