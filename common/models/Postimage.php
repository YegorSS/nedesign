<?php

namespace common\models;

use Yii;
use yii\imagine\Image;

/**
 * This is the model class for table "postimage".
 *
 * @property integer $id
 * @property string $image
 * @property integer $post_id
 */
class Postimage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'postimage';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'post_id' => 'Post ID',
        ];
    }
    
    public function uploadimages()
    {
        if ($this->validate()) {
          foreach ($this->image as $file) {
                $imageUrl = Yii::getAlias('@webroot').'/../../frontend/web/uploads/post/images/';
                $file->saveAs($imageUrl . $file->baseName . '.' . $file->extension);
                
                Image::thumbnail($imageUrl . $file->name, 90, 90)->save($imageUrl . '90/90' . $file->name);
                
          }
            return true;
        } else {
            return false;
        }
    }
    
    public function getPosts()
    {
        return $this->hasOne(Posts::className(), ['id' => 'post_id']);
    }
}
