<?php
namespace common\models;

use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'telephone', 'mail'], 'required'],
            ['mail', 'email'],
            [['details'], 'safe'],
            [['active'], 'integer'],
            ['created', 'safe'],
            ['user_id', 'integer'],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}