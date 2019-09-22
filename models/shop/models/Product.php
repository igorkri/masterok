<?php

namespace app\models\shop\models;

use app\models\shop\models\Category;
use app\models\shop\models\Tag;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property int $price
 * @property int $active
 *
 * @property Category $category
 * @property ProductTag[] $productTags
 * @property Tag[] $tags
 * @property Value[] $values
 * @property Attribute[] $attributes0
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'price', 'active'], 'integer'],
            [['name', 'price'], 'required'],
            [['content'], 'string'],
            [['tagsArray'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категории',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Price',
            'active' => 'Active',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])->viaTable('{{%product_tag}}', ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getValues()
    {
        return $this->hasMany(Value::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes0()
    {
        return $this->hasMany(Attribute::className(), ['id' => 'attribute_id'])->viaTable('{{%value}}', ['product_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\shop\models\query\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\shop\models\query\ProductQuery(get_called_class());
    }
    
    
    private $_tagsArray;

    public function getTagsArray()
    {
        if ($this->_tagsArray === null) {
            $this->_tagsArray = $this->getTags()->select('id')->column();
        }
        return $this->_tagsArray;
    }

    public function setTagsArray($value)
    {
        $this->_tagsArray = (array)$value;
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->updateTags();
        parent::afterSave($insert, $changedAttributes);
    }

    private function updateTags()
    {
        $currentTagIds = $this->getTags()->select('id')->column();
        $newTagIds = $this->getTagsArray();

        foreach (array_filter(array_diff($newTagIds, $currentTagIds)) as $tagId) {
            /** @var Tag $tag */
            /* @var $tagId type */
            if ($tag = Tag::findOne($tagId)) {
                $this->link('tags', $tag);
            }
        }

        foreach (array_filter(array_diff($currentTagIds, $newTagIds)) as $tagId) {
            /** @var Tag $tag */
            if ($tag = Tag::findOne($tagId)) {
                $this->unlink('tags', $tag, true);
            }
        }
    }
    
}
