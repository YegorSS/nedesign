<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class SearchForm extends Model
{
    public $text;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string', 'min' => 2, 'max' => 50],
            [['text'], 'filter', 'filter' => 'trim'],
            [['text'], 'match', 'pattern' => '/[а-яА-Яa-zA-Z0-9]/']
        ];
    }

    
}
