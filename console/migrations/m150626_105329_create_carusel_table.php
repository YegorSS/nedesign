<?php

use yii\db\Schema;
use yii\db\Migration;

class m150626_105329_create_carusel_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('carusel', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING,
            'image' => Schema::TYPE_STRING,
            'active' => Schema::TYPE_BOOLEAN,
            ]);
        
        $this->insert('carusel', [
            'title' => 'Визитки',
            'image' => '5.jpg',
            'active' => true,
        ]);
    }

    public function safeDown()
    {   
        $this->delete('carusel', ['id' => 1]);
        $this->dropTable('carusel');
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
