<?php
namespace backend\modules\calculator;
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        $this->params['foo'] = 'bar';
        // ... остальной инициализирующий код ...
    }
}