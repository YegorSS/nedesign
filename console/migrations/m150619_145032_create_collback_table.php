<?php

use yii\db\Schema;
use yii\db\Migration;

class m150619_145032_create_collback_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('collback', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING,
            'tel' => Schema::TYPE_STRING,
            'post' => Schema::TYPE_STRING,
            'created' => Schema::TYPE_TIMESTAMP,
            'processed' => Schema::TYPE_BOOLEAN . ' DEFAULT 1',
            ]);

        $this->insert('collback', [
            'tel' => '0683636476',
            'name' => 'Вася',
            'post' => 'Визитки',
            'created' => date("Y-m-d H:i:s"),
            'processed' => true,
        ]);
    }

    public function safeDown()
    {
        $this->delete('collback', ['id' => 1]);
        $this->dropTable('collback');
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
