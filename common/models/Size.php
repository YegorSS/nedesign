<?php
namespace common\models;

use yii\db\ActiveRecord;

class Size extends ActiveRecord
{
    public function getProducts()
    {
        return $this->hasOne(Products::className(), [ 'id' => 'product_id']);
    }

    public function getVariants()
    {
        return $this->hasOne(Variants::className(), ['id' => 'variant_id']);
    }

    public function getColors()
    {
        return $this->hasMany(Colors::className(), ['size_id' => 'id']);
    }

    public function getPrices()
    {
        return $this->hasOne(Prices::className(), ['size_id' => 'id']);
    }
}