<?php

use yii\db\Schema;
use yii\db\Migration;

class m150825_084848_create_kurs_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('kurs', [
            'id' => 'pk',
            'materials' => Schema::TYPE_DECIMAL . '(8,2)',
            'works' => Schema::TYPE_DECIMAL . '(8,2)',
        ]);

         $this->insert('kurs', [
            'materials' => '22.5',
            'works' => '1.1',
        ]);
    }

    public function safeDown()
    {
        $this->delete('kurs', ['id' => 1]);
        $this->dropTable('kurs');
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
