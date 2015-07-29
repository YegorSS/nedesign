<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_122838_create_variants_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('variants', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'product_id' => Schema::TYPE_INTEGER,
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('variants');
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
