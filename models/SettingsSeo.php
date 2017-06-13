<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "settings_seo".
 *
 * @property integer $id
 * @property string $identificator
 * @property string $title
 * @property string $description
 * @property string $keywords
 */
class SettingsSeo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings_seo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['identificator'], 'required'],
            [['description'], 'string'],
            [['identificator', 'title'], 'string', 'max' => 255],
            [['keywords'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'identificator' => Yii::t('app', 'Identificator'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'keywords' => Yii::t('app', 'Keywords'),
        ];
    }
}
