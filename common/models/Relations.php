<?php
namespace common\models;

use yii\db\ActiveRecord;

class Relations extends ActiveRecord
{
    public function getProducts()
    {
        return $this->hasOne(Products::className(), [ 'id' => 'product_id']);
    }

    public function getServices()
    {
        return $this->hasOne(Services::className(), [ 'id' => 'service_id']);
    }
}