<?php

namespace app\models;

use Yii;
use yii\base\Model;


class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    public function rules()
    {
        return [
            [['name', 'email', 'subject', 'body'], 'required'],
            ['email', 'email'],
            ['verifyCode', 'captcha'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => Yii::t('app', 'Verification Code'),
            'name' => Yii::t('app', 'Your Name'),
            'body' => Yii::t('app', 'Body'),
            'subject' => Yii::t('app', 'Subject'),
            'email' => Yii::t('app', 'Your Email')
        ];
    }

    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['adminEmail'] => 'Bot'])
                ->setSubject($this->subject)
                ->setTextBody($this->body . "\nОтправитель:  \n" . $this->email)
                ->send();
            return true;
        }
        return false;
    }
}