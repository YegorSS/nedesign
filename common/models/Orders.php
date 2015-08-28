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
            [['details'], 'safe'],
        ];
    }
}