<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_123530_create_prices_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('prices', [
            'id' => 'pk',
            'price' => Schema::TYPE_DECIMAL . '(8,2)',
            'color_id' => Schema::TYPE_INTEGER,
            'size_id' => Schema::TYPE_INTEGER,
            'service_id' => Schema::TYPE_INTEGER,
            'product_id' => Schema::TYPE_INTEGER,
        ]);

        $this->insert('prices', [
            'price' => '75',
            'color_id' => NULL,
            'size_id' => NULL,
            'service_id' => 1,
            'product_id' => 0,
        ]);
    }

    public function safeDown()
    {
        $this->delete('prices', ['id' => 1]);
        $this->dropTable('prices');
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
