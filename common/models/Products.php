<?php
namespace common\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{
    public function rules()
    {
        return [
            ['title', 'required', 'message' => 'Необходимо ввести Title.'],
            ['formula', 'string'],
        ];
    }
    
    public function getVariants()
    {
        return $this->hasMany(Variants::className(), ['product_id' => 'id']);
    }

    public function getSize()
    {
        return $this->hasMany(Size::className(), ['product_id' => 'id']);
    }
    
    public function getRelations()
    {
        return $this->hasMany(Relations::className(), ['product_id' => 'id']);
    }

    public function getMatrelations()
    {
        return $this->hasMany(Matrelations::className(), ['product_id' => 'id']);
    }
}