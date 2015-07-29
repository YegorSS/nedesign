<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carusel".
 *
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property integer $active
 */
class Carusel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carusel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['image'], 'file', 'extensions' => 'png, jpg, gif', 'checkExtensionByMimeType'=>false],
            [['title'], 'string', 'max' => 255],
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
            'image' => 'Image',
            'active' => 'Active',
        ];
    }
    
    
    public function uploadimage()
    {
        if ($this->validate()) {
          $imageUrl = Yii::getAlias('@webroot').'/../../frontend/web/uploads/carusel/img/';
          $this->image->saveAs($imageUrl . $this->image->baseName . '.' . $this->image->extension);
              
            return true;
        } else {
            return false;
        }
    }
}
