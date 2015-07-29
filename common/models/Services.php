<?php
namespace common\models;

use yii\db\ActiveRecord;

class Services extends ActiveRecord
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'price' => 'Цена',
            'unit' => 'За штуку?',
        ];
    }
    
    public function getPrices()
    {
        return $this->hasMany(Prices::className(), ['service_id' => 'id']);
    }
    
    public function getRelations()
    {
        return $this->hasMany(Relations::className(), ['service_id' => 'id']);
    }
}