<?php
namespace common\models;

use yii\db\ActiveRecord;

class Variants extends ActiveRecord
{
    public function getProducts()
    {
        return $this->hasOne(Products::className(), [ 'id' => 'product_id']);
    }

    public function getSize()
    {
        return $this->hasMany(Size::className(), ['variant_id' => 'id']);
    }
}