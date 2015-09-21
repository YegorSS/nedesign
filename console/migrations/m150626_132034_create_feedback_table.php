<?php

use yii\db\Schema;
use yii\db\Migration;

class m150626_132034_create_feedback_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('feedback', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING,
            'company' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING,
            'tel' => Schema::TYPE_STRING,
            'coment' => Schema::TYPE_TEXT,
            'post' => Schema::TYPE_STRING,
            'created' => Schema::TYPE_TIMESTAMP,
            'processed' => Schema::TYPE_BOOLEAN . ' DEFAULT 1',
            'user_id' => Schema::TYPE_INTEGER,
            ]);

        $this->insert('feedback', [
            'name' => 'Vasya',
            'company' => 'Roga i Copyta',
            'email' => 'lalala@com.ua',
            'tel' => '0663256842',
            'coment' => 'lyalyalya',
            'post' => 'Визитки',
            'created' => date("Y-m-d H:i:s"),
            'processed' => true,
            'user_id' => 1,
        ]);
    }

    public function safeDown()
    {
        $this->delete('feedback', ['id' => 1]);
        $this->dropTable('feedback');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
