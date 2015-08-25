<?php

use yii\db\Schema;
use yii\db\Migration;

class m150623_140159_create_postimage_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('postimage', [
            'id' => 'pk',
            'image' => Schema::TYPE_STRING,
            'post_id' => Schema::TYPE_INTEGER,
            'title' => Schema::TYPE_STRING,
            'alt' => Schema::TYPE_STRING,
            ]);
    }

    public function safeDown()
    {
        $this->dropTable('postimage');
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
