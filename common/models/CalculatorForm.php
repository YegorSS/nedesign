<?php
namespace common\models;

use yii\base\Model;

class EntryForm extends Model
{
    public $quantity;
    public $variant;
    public $size;
    public $color;
    public $quantityColor1;
    public $quantityColor2;

    public function rules()
    {
        return [
            [['quantity', 'variant', 'size', 'color', 'quantityColor1', 'quantityColor2'], 'required'],
        ];
    }
}