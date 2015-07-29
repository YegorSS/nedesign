<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $h_1
 * @property string $keywords
 * @property string $description
 * @property string $alias
 * @property string $text
 * @property integer $rate
 * @property integer $voites
 * @property integer $active
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'h_1', 'alias'], 'required'],
            [['text'], 'string'],
            [['h_2'], 'string'],
            [['rate', 'voites', 'active'], 'integer'],
            [['title', 'h_1', 'keywords', 'description', 'alias'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'h_1' => 'H 1',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'alias' => 'Alias',
            'text' => 'Text',
            'rate' => 'Rate',
            'voites' => 'Voites',
            'active' => 'Active',
        ];
    }
}
