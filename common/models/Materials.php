<?php
namespace common\models;

use yii\db\ActiveRecord;

class Materials extends ActiveRecord
{
    
    public function getMatrelations()
    {
        return $this->hasMany(Matrelations::className(), ['material_id' => 'id']);
    }
}