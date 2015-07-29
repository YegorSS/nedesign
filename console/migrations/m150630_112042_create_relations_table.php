<?php

use yii\db\Schema;
use yii\db\Migration;

class m150630_112042_create_relations_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('relations', [
            'id' => 'pk',
            'product_id' => Schema::TYPE_INTEGER,
            'service_id' => Schema::TYPE_INTEGER,
        ]);
        
        $this->insert('relations', [
            'product_id' => 1,
            'service_id' => 1,
        ]);
        $this->insert('relations', [
            'product_id' => 1,
            'service_id' => 2,
        ]);
        $this->insert('relations', [
            'product_id' => 1,
            'service_id' => 3,
        ]);
    }

    public function safeDown()
    {
        $this->delete('relations', ['id' => 3]);
        $this->delete('relations', ['id' => 2]);
        $this->delete('relations', ['id' => 1]);
        $this->dropTable('relations');
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
