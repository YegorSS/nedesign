<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rating".
 *
 * @property integer $id
 * @property integer $rate
 * @property integer $voites
 * @property string $user_ip
 * @property integer $post_id
 */
class Rating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rate', 'voites', 'post_id'], 'integer'],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rate' => 'Rate',
            'voites' => 'Voites',
            'post_id' => 'Post ID',
        ];
    }
    
    public function getPosts()
    {
        return $this->hasOne(Posts::className(), ['id' => 'post_id']);
    }
}
