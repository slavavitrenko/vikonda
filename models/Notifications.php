<?php

namespace app\models;

use Yii;


class Notifications extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'notifications';
    }

    public function rules()
    {
        return [
            [['email', 'text'], 'required'],
            [['text'], 'string'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    public static function notify($email='', $text=''){
        $model = new Notifications;
        $model->email = $email;
        $model->text = $text;
        return $model->save(false);
    }
    
}