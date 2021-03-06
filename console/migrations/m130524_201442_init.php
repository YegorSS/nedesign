<?php

use yii\db\Schema;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'fio' => Schema::TYPE_STRING,
            'company' => Schema::TYPE_STRING,
            'telephone' => Schema::TYPE_STRING,

            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);
        
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => 'uh006zruZj8FZNicGDvZJfp2vYbG5Y4z',
            'password_hash' => '$2y$13$8WXGcUa2RHbCdD80RlpWSeAm0cNi8Gw9ho3DR4tpG01U7l/9VPN..',
            'password_reset_token' => '',
            'email' => 'yegor@yandex.ru',
            'fio' => 'Admin Adminivich',
            'company' => '1design',
            'telephone' => '(068)3636476',

            'created_at' => '1432381596',
            'updated_at' => '1432381596',
        ]);
    }

    public function down()
    {
        $this->delete('{{%user}}', ['id' => 1]);
        $this->dropTable('{{%user}}');
    }
}
