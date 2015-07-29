<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_122643_create_products_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'formula' => Schema::TYPE_STRING,
        ]);

        $this->insert('products', [
            'title' => 'Пакеты',
            'formula' => 'quantity * (colorQuantity * priceWork + colorPrice) + firstPrice'
        ]);
    }

    public function safeDown()
    {
        $this->delete('products', ['id' => 1]);
        $this->dropTable('products');
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
