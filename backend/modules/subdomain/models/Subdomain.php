<?php
namespace backend\modules\subdomain\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class Subdomain extends Model
{
    public $name;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'min' => 2, 'max' => 10],
            [['name'], 'filter', 'filter' => 'trim'],
            [['name'], 'match', 'pattern' => '/[a-zA-Z0-9]/']
        ];
    }

    
}