<?php

namespace common\models;

use Yii;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;

/**
 * This is the model class for table "Categories".
 *
 * @property integer $id
 * @property string $title
 * @property string $header
 * @property string $text
 * @property string $keywords
 * @property string $description
 * @property string $alias
 * @property integer $parent_id
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'header_meny', 'type', 'h_1'], 'required'],
            [['text', 'h_1', 'h_2'], 'string'],
            [['parent_id'], 'integer'],
            [['active'], 'integer'],
            [['title', 'header_meny', 'keywords', 'description', 'alias'], 'string', 'max' => 255],
            [['rate'], 'integer'],
            [['rate'], 'default', 'value' => 5],
            [['voites'], 'integer'],
            [['voites'], 'default', 'value' => 1],
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
            'header_meny' => 'Header',
            'h_1' => 'H 1',
            'h_2' => 'H 2',
            'text' => 'Text',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'alias' => 'Alias',
            'parent_id' => 'Parent ID',
            'active' => 'Опубликовано',
        ];
    }
    
    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['category_id' => 'id']);
    }

    public function getNews()
    {
        return $this->hasMany(News::className(), ['category_id' => 'id']);
    }
    
    public function behaviors()
    {
      return [
        'sitemap' => [
            'class' => SitemapBehavior::className(),
            'scope' => function ($model) {
                /** @var \yii\db\ActiveQuery $model */
                $model->select(['id','title']);
                $model->andWhere(['active' => true]);
            },
            'dataClosure' => function ($model) {
                /** @var self $model */
                return [
                    'loc' => Url::to('@web/category/' . $model->id, true),
                    'lastmod' => strtotime(date("m.d.y")),
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                   // 'images' => [
                    //    [
                    //      'loc' => Url::to($model->mainimage),
                    //      'caption' => $model->title,
                    //    ]
                   // ],
                ];
            }
        ],
      ];
    }
}
