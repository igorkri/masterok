<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property int $id_service
 * @property string $meta_key
 * @property string $meta_desk
 * @property string $title
 * @property int $stars
 * @property string $title_slide
 * @property string $img_slide
 * @property string $img_menu
 * @property string $link
 * @property string $name
 * @property string $title_page
 * @property string $rating
 * @property string $text
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_service', 'meta_desk', 'title', 'title_slide', 'img_slide', 'link', 'name', 'title_page'], 'required'],
            [['id_service',], 'integer'],
            [['text', 'rating'], 'string'],
            [['meta_key', 'meta_desk', 'title', 'title_slide', 'img_slide', 'img_menu', 'title_page'], 'string', 'max' => 255],
            [['link', 'name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_service' => 'Id Service',
            'meta_key' => 'Ключевые слова meta',
            'meta_desk' => 'Описание meta',
            'title_slide' => 'Название Slide',
            'stars' => 'Кол голосов',
            'rating' => 'Среднее ар голосов',
            'title' => 'Title',
            'img_slide' => 'Img Slide',
            'link' => 'Ссылка',
            'name' => 'Название меню',
            'title_page' => 'Название статьи',
            'img_menu' => 'imgMenu',
            'text' => 'Текст статьи',
        ];
    }
    
}
