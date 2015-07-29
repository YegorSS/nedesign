<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "feedback".
 *
 * @property integer $id
 * @property string $name
 * @property string $company
 * @property string $email
 * @property string $tel
 * @property string $coment
 * @property string $post
 * @property string $created
 * @property integer $processed
 */
class Feedback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'feedback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created'], 'safe'],
            [['processed'], 'integer'],
            [['coment'], 'string'],
            [['name', 'company', 'email', 'tel', 'post'], 'string', 'max' => 255],
            [['name', 'email'], 'required', 'message' => 'Данное поле необходимо заполнить!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'company' => 'Company',
            'email' => 'Email',
            'tel' => 'Tel',
            'coment' => 'Coment',
            'post' => 'Post',
            'created' => 'Created',
            'processed' => 'Processed',
        ];
    }
}
