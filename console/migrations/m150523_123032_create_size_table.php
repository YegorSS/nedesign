<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_123032_create_size_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('size', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'description' => Schema::TYPE_STRING,
            'variant_id' => Schema::TYPE_INTEGER,
            'product_id' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('size');
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
