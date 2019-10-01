<?php

namespace app\models\shop\models;

use Yii;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property int $id
 * @property int $category_id
 * @property string $sku
 * @property string $name
 * @property string $content
 * @property int $price
 * @property int new_$price
 * @property int $active
 * @property int $hit
 * @property int $sale
 * @property int $new
 * @property int $status
 * @property int $original
 * @property string $compatible
 * @property int $parent_bred_id
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    
    
    public $image;
    public $gallery;
    
    
    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    
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
            [['category_id', 'price', 'new_price', 'active', 'hit', 'sale', 'new', 'status', 'original', 'parent_bred_id'], 'integer'],
            [['sku', 'name', 'price'], 'required'],
            [['content', 'compatible'], 'string'],
            [['sku', 'name'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
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
            'category_id' => 'Категория',
            'sku' => 'Артикул',
            'name' => 'Название',
            'content' => 'Описание',
            'price' => 'Цена',
            'new_price' => 'Новая цена',
            'active' => 'Наличие',
            'hit' => 'Хит',
            'sale' => 'Расспродажа',
            'new' => 'Новинка',
            'status' => 'Новый (или Б\У)',
            'original' => 'Оригинал',
            'compatible' => 'Совместимость с моделями',
            'parent_bred_id' => 'Бренд',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    
    public function getBrend()
    {
        return $this->hasOne(Brend::className(), ['id' => 'parent_bred_id']);
    }
    
    
      public function upload(){
        if($this->validate()){
            $path = 'upload/store/' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
//            debug($path); die;
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        }else{
            return false;
        }
    }
 
    public function uploadGallery(){ // сохраняет целиком галерею
        if($this->validate()){
            foreach($this->gallery as $file){
                $path = 'upload/store/' . $file->baseName . '.' . $file->extension;
                $file->saveAs($path);
                $this->attachImage($path);
                @unlink($path);
            }
            return true;
        }else{
            return false;
        }
    }
    
    
}
