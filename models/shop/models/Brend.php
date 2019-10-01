<?php

namespace app\models\shop\models;

use Yii;

/**
 * This is the model class for table "{{%brend}}".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_bred_id
 */
class Brend extends \yii\db\ActiveRecord
{
    public $image;
    
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
        return '{{%brend}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['parent_bred_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'parent_bred_id' => 'Parent Bred ID',
        ];
    }
    
    
    public function getBrend()
    {
        return $this->hasOne(Product::className(), ['id' => 'parent_brend_id']);
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
}
