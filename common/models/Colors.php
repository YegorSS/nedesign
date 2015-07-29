<?php
namespace common\models;

use yii\db\ActiveRecord;

class Colors extends ActiveRecord
{
    public function getSize()
    {
        return $this->hasOne(Size::className(), [ 'id' => 'size_id']);
    }

    public function getPrices()
    {
        return $this->hasOne(Prices::className(), [ 'color_id' => 'id']);
    }
}