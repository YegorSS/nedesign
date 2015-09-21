<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "collback".
 *
 * @property integer $id
 * @property integer $tel
 * @property string $post
 * @property string $created
 * @property integer $processed
 */
class Collback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'collback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['processed'], 'integer'],
            [['created'], 'safe'],
            [['tel'], 'string', 'max' => 15],
            [['name'], 'string', 'max' => 255],
            [['tel'], 'required', 'message' => 'Необходимо написать номер телефона!'],
            [['post'], 'string', 'max' => 255],
            ['user_id', 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => 'Телефон*',
            'name' => 'Ваше имя',
            'post' => 'Post',
            'created' => 'Created',
            'processed' => 'Processed',
        ];
    }
}
