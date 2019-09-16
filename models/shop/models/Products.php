<?php

namespace app\models\shop\models;

use app\models\shop\models\Categories;
use Yii;

/**
 * This is the model class for table "{{%products}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $sku
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%products}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id'], 'integer'],
            [['name'], 'required'],
            [['sku', 'content', 'hit', 'new', 'sale'], 'string'],
            [['price', 'price_sale'], 'number'],
            [['img'],'default', 'value' => 'no-image.png'],
            [['sku', 'name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category_id' => Yii::t('app', 'Category ID'),
            'sku' => Yii::t('app', 'Артикул'),
            'name' => Yii::t('app', 'Name'),
            'content' => Yii::t('app', 'Content'),
            'price' => Yii::t('app', 'Price'),
            'price_sale' => Yii::t('app', 'Price Sale'),
            'keywords' => Yii::t('app', 'Keywords'),
            'description' => Yii::t('app', 'Description'),
            'img' => Yii::t('app', 'Img'),
            'hit' => Yii::t('app', 'Хит'),
            'new' => Yii::t('app', 'Новинка'),
            'sale' => Yii::t('app', 'Распродажа'),
        ];
    }
    
    public function getCategory(){
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }
    
}
