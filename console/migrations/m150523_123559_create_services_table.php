<?php

use yii\db\Schema;
use yii\db\Migration;

class m150523_123559_create_services_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('services', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'unit' => Schema::TYPE_INTEGER,
        ]);

        $this->insert('services', [
            'title' => 'Доставка',
        ]);
        $this->insert('services', [
            'title' => 'Первый прогон',
        ]);
        $this->insert('services', [
            'title' => 'Печатные работы',
        ]);
    }

    public function safeDown()
    {
        $this->delete('services', ['id' => 3]);
        $this->delete('services', ['id' => 2]);
        $this->delete('services', ['id' => 1]);
        $this->dropTable('services');
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
