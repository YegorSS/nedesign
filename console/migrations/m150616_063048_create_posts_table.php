<?php

use yii\db\Schema;
use yii\db\Migration;

class m150616_063048_create_posts_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('posts', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'header_meny' => Schema::TYPE_STRING . ' NOT NULL',
            'h_1' => Schema::TYPE_STRING . ' NOT NULL',
            'h_2' => Schema::TYPE_STRING . ' NOT NULL',
            'keywords' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            'alias' => Schema::TYPE_STRING . ' NOT NULL',
            'text' => Schema::TYPE_TEXT,
            'price' => Schema::TYPE_TEXT,
            'minorder' => Schema::TYPE_INTEGER,
            'category_id' => Schema::TYPE_INTEGER,
            'mainimage' => Schema::TYPE_STRING,
            'altmainimage' => Schema::TYPE_STRING,
            'titlemainimage' => Schema::TYPE_STRING,
            'rate' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 5',
            'voites' => Schema::TYPE_INTEGER . ' NOT NULL  DEFAULT 1',
            'product_id' => Schema::TYPE_INTEGER,
            'active' => Schema::TYPE_BOOLEAN,
            'tegs' => Schema::TYPE_TEXT,
        ]);

        $this->insert('posts', [
            'title' => 'Печать на пакетах Киев Пакеты с логотипом Фирменные кульки с логотипом',
            'header_meny' => 'Пакеты, кульки',
            'h_1' => 'Печать на пакетах логотипа киев кульки с логотипом',
            'h_2' => 'Пакеты с логотипом кулек с логотипом печать на кульках',
            'keywords' => 'пакеты с логотипом,печать на пакетах,печать на пакетах киев,пакеты с логотипом киев,пакеты полиэтиленовые киев,изготовление пакетов с логотипом,печать пакетов,пакеты с печатью,пакет с логотипом,заказать пакеты с логотипом,фирменные пакеты,пакеты полиэтиленовые с логотипом,печать на полиэтиленовых пакетах,друк на пакетах,печать пакетов с логотипом,пакеты с логотипом компании,реклама на пакетах,пакеты на заказ,кульки с логотипом',
            'description' => 'Пакеты с логотипом от 1Design®. Печать на пакетах из полиэтилена, печать логотипа на полиэтиленовых кульках 20х30 30х40 40х50 60х60 см, разные цвета. Печать кульков малыми партиями',
            'text' => 'Печать визиток ...',
            'price' => 'Печать визиток ...',
            'minorder' => 100,
            'alias' => 'vizitki',
            'category_id' => 1,
            'mainimage' => 'vizitki.jpeg',
            'altmainimage' => 'Печать визиток',
            'titlemainimage' => 'Печать визиток',
            'product_id' => 1,
            'active' => true,
            'tegs' => 'печать плаката,изготовление плакатов,печать плакатов постеров,заказать плакат,напечатать плакат,изготовление плакатов киев,изготовление афиш,заказать рекламный плакат,печать плаката а3,печать плакатов на а4,изготовление плакатов баннеров,печать плаката на а4,изготовление плакатов на заказ,изготовление рекламных плакатов,заказать плакат киев',
        ]);
    }

    public function safeDown()
    {
        $this->delete('posts', ['id' => 1]);
        $this->dropTable('posts');
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
