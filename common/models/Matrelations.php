<?php
namespace common\models;

use yii\db\ActiveRecord;

class Matrelations extends ActiveRecord
{
    public function getProducts()
    {
        return $this->hasOne(Products::className(), [ 'id' => 'product_id']);
    }

    public function getMaterials()
    {
        return $this->hasOne(Materials::className(), [ 'id' => 'material_id']);
    }
}