<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string $created_at
 * @property int $akt
 * @property string $appliances
 * @property string $sn_model
 * @property string $repairs
 * @property int $price
 * @property int $guarantee
 * @property string $phone
 * @property int $material_price
 * @property int $repairs_price
 * @property string $address
 * @property string $status
 * @property string $comment
 */
class CustomerRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }


    const STATUS_WORK = 0; //В работе
    const STATUS_NOTICE = 1; //Уведомлен о цене
    const STATUS_MAKE = 2; //Сделано
    const STATUS_NAIL = 3; //Забрали
    const STATUS_ORDER = 4; //Заказано запчасти


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'akt', 'appliances', 'phone'], 'required'],
            [['akt', 'price', 'guarantee', 'material_price', 'repairs_price'], 'integer'],
            [['comment'], 'string'],
            ['status', 'default', 'value' => self::STATUS_WORK],
            ['status', 'in', 'range' => [
                self::STATUS_WORK,
                self::STATUS_NOTICE,
                self::STATUS_MAKE,
                self::STATUS_NAIL,
                self::STATUS_ORDER,
            ]],
            [['appliances', 'repairs', 'phone', 'address', 'created_at'], 'string', 'max' => 255],
            [['sn_model'], 'string', 'max' => 100],
            [['akt'], 'unique'],
            [['price'],'default', 'value' => 50],
            [['material_price', 'guarantee', 'sn_model', 'address'],'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Дата',
            'akt' => 'Акт №',
            'appliances' => 'Бытовая техника',
            'sn_model' => 'S/N Модель',
            'repairs' => 'Что отремонтировано',
            'price' => 'Цена',
            'guarantee' => 'Гарантия(мес.)',
            'phone' => 'Телефон',
            'material_price' => 'Цена материалла',
            'repairs_price' => ' Стоимость работы',
            'status' => 'Статус',
            'address' => 'Адрес',
            'comment' => 'Коментарий',
        ];
    }
}
