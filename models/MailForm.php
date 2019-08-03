<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 05.01.19
 * Time: 22:11
 */

namespace app\models;

use Yii;
use yii\base\Model;

class MailForm extends Model
{
    public $user;
    public $phone;
    public $text;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['user', 'phone', 'text'], 'required'],
            ['verifyCode', 'captcha'],
        ];
    }

        public function attributeLabels()
    {
        return [
            'verifyCode' => 'Введите код*',
            'user' => 'Имя',
            'phone' => 'Телефон',
            'text' => 'Сообщение',
        ];
    }


    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo('igorkri26@gmail.com')
                ->setFrom('igorkri26@gmail.com')
                ->setSubject("Сообщение из MasterOK - ")
                ->setHtmlBody("<b>Имя:</b> $this->user <br>" . "<b>Телефон:</b> $this->phone <br>" . "<b>Сообщение:</b> $this->text")
                ->send();

            return true;
        }
        return false;
    }
}