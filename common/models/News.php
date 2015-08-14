<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $h_1
 * @property string $keywords
 * @property string $description
 * @property string $text
 * @property string $alias
 * @property integer $category_id
 * @property integer $rate
 * @property integer $voites
 * @property integer $active
 * @property string $created
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'h_1', 'alias'], 'required'],
            [['alias', 'title', 'h_1'], 'unique'],
            [['text'], 'string'],
            [['category_id', 'rate', 'voites', 'active'], 'integer'],
            [['rate'], 'default', 'value' => 5],
            [['voites'], 'default', 'value' => 1],
            [['created'], 'safe'],
            [['title', 'h_1', 'h_2', 'keywords', 'description', 'alias'], 'string', 'max' => 255]
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
            'h_2' => 'H 2',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'text' => 'Text',
            'alias' => 'Alias',
            'category_id' => 'Category ID',
            'rate' => 'Rate',
            'voites' => 'Voites',
            'active' => 'Active',
            'created' => 'Created',
        ];
    }

    public function getCategories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
}
