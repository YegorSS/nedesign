<?php

use yii\db\Schema;
use yii\db\Migration;

class m150811_084915_create_materials_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('materials', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'price' => Schema::TYPE_INTEGER,
        ]);

         $this->insert('materials', [
            'title' => 'Клише (цена за сантиметр)',
            'price' => 100,
        ]);
    }

    public function safeDown()
    {
        $this->delete('materials', ['id' => 1]);
        $this->dropTable('materials');
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
