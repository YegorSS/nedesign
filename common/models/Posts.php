<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use himiklab\sitemap\behaviors\SitemapBehavior;
use yii\helpers\Url;
/**
 * This is the model class for table "Posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $header
 * @property string $text
 * @property string $keywords
 * @property string $description
 * @property string $alias
 * @property integer $category_id
 * @property string $image
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'header_meny'], 'required'],
            [['alias', 'title', 'h_1', 'header_meny', 'tegs'], 'unique'],
            [['text'], 'string'],
            [['tegs'], 'string'],
            [['price'], 'string'],
            [['rate'], 'integer'],
            [['rate'], 'default', 'value' => 5],
            [['voites'], 'integer'],
            [['voites'], 'default', 'value' => 1],
            [['minorder'], 'default', 'value' => 100],
            [['minorder'], 'integer'],
            [['category_id'], 'integer'],
            [['product_id'], 'integer'],
            [['mainimage'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif', 'checkExtensionByMimeType' => false],
            [['title', 'header_meny', 'h_1', 'h_2', 'keywords', 'description', 'alias'], 'string', 'max' => 255],
            [['active'], 'safe']
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
            'header_meny' => 'Заголовок в меню',
            'h_1' => 'H1',
            'H2' => 'H2',
            'text' => 'Текст',
            'price' => 'Цены',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'alias' => 'Alias',
            'category_id' => 'Category ID',
            'product_id' => 'Калькулятор',
            'mainimage' => 'Главное изображение',
            'minorder' => 'Минимальный заказ',
            'rate' => 'Сумма голосов',
            'voites' => 'Кол-во проголосовавших',
        ];
    }
    
    
    
    public function uploadmainimage()
    {
        if ($this->validate()) {
          $imageUrl = Yii::getAlias('@webroot').'/../../frontend/web/uploads/post/main/';
          $this->mainimage->saveAs($imageUrl . $this->mainimage->baseName . '.' . $this->mainimage->extension);
              
          Image::thumbnail($imageUrl . $this->mainimage->name, 300, 300)->save($imageUrl . '300/300' . $this->mainimage->name);
          Image::thumbnail($imageUrl . $this->mainimage->name, 200, 200)->save($imageUrl . '200/200' . $this->mainimage->name);
          Image::thumbnail($imageUrl . $this->mainimage->name, 155, 155)->save($imageUrl . '155/155' . $this->mainimage->name);
          Image::thumbnail($imageUrl . $this->mainimage->name, 65, 65)->save($imageUrl . '65/65' . $this->mainimage->name);
              
            return true;
        } else {
            return false;
        }
    }
    
    public function getCatagories()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }
    
    public function getRating()
    {
        return $this->hasOne(Rating::className(), ['post_id' => 'id']);
    }
    
    public function getPostimage()
    {
        return $this->hasMany(Postimage::className(), ['post_id' => 'id']);
    }
    
    public function behaviors()
    {
      return [
        'sitemap' => [
            'class' => SitemapBehavior::className(),
            'scope' => function ($model) {
                /** @var \yii\db\ActiveQuery $model */
                $model->select(['alias','title','mainimage']);
                $model->andWhere(['active' => true]);
            },
            'dataClosure' => function ($model) {
                /** @var self $model */
                return [
                    'loc' => Url::to('@web/' . $model->alias, true),
                    'lastmod' => strtotime(date("m.d.y")),
                    'changefreq' => SitemapBehavior::CHANGEFREQ_DAILY,
                    'priority' => 0.8,
                    'images' => [
                        [
                          'loc' => Url::to('@web/uploads/post/main/' . $model->mainimage),
                          'caption' => $model->header_meny,
                          'title' => $model->title,
                        ]
                    ],
                ];
            }
        ],
      ];
    }
}
