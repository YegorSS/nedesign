<?php
namespace common\models;

use yii\db\ActiveRecord;

class Kurs extends ActiveRecord
{
	public function rules()
    {
        return [
            [['materials'], 'number'],
            [['works'], 'number'],
        ];
    }
	
}