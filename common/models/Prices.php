<?php
namespace common\models;

use yii\db\ActiveRecord;

class Prices extends ActiveRecord
{
    public function getColors()
    {
        return $this->hasOne(Colors::className(), [ 'id' => 'color_id']);
    }

    public function getSize()
    {
        return $this->hasOne(Size::className(), [ 'id' => 'size_id']);
    }

    public function getServices()
    {
        return $this->hasOne(Services::className(), [ 'id' => 'service_id']);
    }
}