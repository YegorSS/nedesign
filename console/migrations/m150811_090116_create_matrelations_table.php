<?php

use yii\db\Schema;
use yii\db\Migration;

class m150811_090116_create_matrelations_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('matrelations', [
            'id' => 'pk',
            'product_id' => Schema::TYPE_INTEGER,
            'material_id' => Schema::TYPE_INTEGER,
        ]);

         $this->insert('matrelations', [
            'product_id' => 1,
            'material_id' => 1,
        ]);
    }

    public function safeDown()
    {
        $this->delete('matrelations', ['id' => 1]);
        $this->dropTable('matrelations');
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
