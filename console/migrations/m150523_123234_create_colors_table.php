<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_123234_create_colors_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('colors', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'size_id' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('colors');
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
