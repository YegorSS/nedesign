<?php

use yii\db\Schema;
use yii\db\Migration;

class m150724_065957_create_news_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'h_1' => Schema::TYPE_STRING . ' NOT NULL',
            'h_2' => Schema::TYPE_STRING,
            'keywords' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            'text' => Schema::TYPE_TEXT,
            'alias' => Schema::TYPE_STRING . ' NOT NULL',
            'category_id' => Schema::TYPE_INTEGER,
            'rate' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 5',
            'voites' => Schema::TYPE_INTEGER . ' NOT NULL  DEFAULT 1',
            'active' => Schema::TYPE_BOOLEAN,
            'created' => Schema::TYPE_TIMESTAMP,
        ]);

        $this->insert('news', [
            'title' => 'ИМИДЖ НАЧИНАЕТСЯ С VIP ВИЗИТКИ',
            'h_1' => 'ИМИДЖ НАЧИНАЕТСЯ С VIP ВИЗИТКИ',
            'keywords' => 'пакеты с логотипом,печать на пакетах,печать на пакетах киев,пакеты с логотипом киев,пакеты полиэтиленовые киев,изготовление пакетов с логотипом,печать пакетов,пакеты с печатью,пакет с логотипом,заказать пакеты с логотипом,фирменные пакеты,пакеты полиэтиленовые с логотипом,печать на полиэтиленовых пакетах,друк на пакетах,печать пакетов с логотипом,пакеты с логотипом компании,реклама на пакетах,пакеты на заказ,кульки с логотипом',
            'description' => 'ИМИДЖ НАЧИНАЕТСЯ С VIP ВИЗИТКИ',
            'text' => 'ИМИДЖ НАЧИНАЕТСЯ С VIP ВИЗИТКИ',
            'alias' => 'vip-vizitki-pechat-nachinaetsa',
            'category_id' => 2,
            'active' => true,
            'created' => date("Y-m-d H:i:s"),
        ]);
    }

    public function safeDown()
    {
        $this->delete('news', ['id' => 1]);
        $this->dropTable('news');
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
