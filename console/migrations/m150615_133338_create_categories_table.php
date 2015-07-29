<?php

use yii\db\Schema;
use yii\db\Migration;

class m150615_133338_create_categories_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('categories', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'header_meny' => Schema::TYPE_STRING . ' NOT NULL',
            'h_1' => Schema::TYPE_STRING . ' NOT NULL',
            'h_2' => Schema::TYPE_STRING,
            'text' => Schema::TYPE_TEXT,
            'keywords' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            'alias' => Schema::TYPE_STRING,
            'parent_id' => Schema::TYPE_INTEGER,
            'active' => Schema::TYPE_BOOLEAN,
            'type' => Schema::TYPE_STRING,
            'rate' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 5',
            'voites' => Schema::TYPE_INTEGER . ' NOT NULL  DEFAULT 1',
        ]);

        $this->insert('categories', [
            'title' => 'Полиграфическая продукция',
            'header_meny' => 'Полиграфия',
            'h_1' => 'Полиграфическая продукция',
            'h_2' => 'Наша продукция',
            'text' => 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция',
            'keywords' => 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция',
            'description' => 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция',
            'alias' => 'poligraficheskie-uslugi',
            'parent_id' => 0,
            'active' => true,
            'type' => 'post',
        ]);

        $this->insert('categories', [
            'title' => 'Дизайн',
            'header_meny' => 'Дизайн',
            'h_1' => 'Новости дизайна',
            'h_2' => 'О дизайне',
            'text' => 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция',
            'keywords' => 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция',
            'description' => 'Полиграфическая продукция Полиграфическая продукция Полиграфическая продукция',
            'alias' => 'design',
            'parent_id' => 0,
            'active' => true,
            'type' => 'news',
        ]);
    }

    public function safeDown()
    {
        $this->delete('categories', ['id' => 2]);
        $this->delete('categories', ['id' => 1]);
        $this->dropTable('categories');
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
