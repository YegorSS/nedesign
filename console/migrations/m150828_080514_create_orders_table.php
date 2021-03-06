<?php

use yii\db\Schema;
use yii\db\Migration;

class m150828_080514_create_orders_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => 'pk',
            'name' => Schema::TYPE_STRING,
            'telephone' => Schema::TYPE_STRING,
            'mail' => Schema::TYPE_STRING,
            'details' => Schema::TYPE_TEXT,
            'active' => Schema::TYPE_BOOLEAN. ' DEFAULT 1',
            'created' => Schema::TYPE_TIMESTAMP,
            'user_id' => Schema::TYPE_INTEGER,
        ]);

         $this->insert('orders', [
            'name' => 'Vasya',
            'telephone' => '1234567',
            'mail' => 'vasya@lala.ua',
            'details' => 'banan;30x40;white;50;1;3',
            'active' => true,
            'created' => date("Y-m-d H:i:s"),
            'user_id' => 1,
        ]);
    }

    public function safeDown()
    {
        $this->delete('orders', ['id' => 1]);
        $this->dropTable('orders');
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
