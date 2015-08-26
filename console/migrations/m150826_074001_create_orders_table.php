<?php

use yii\db\Schema;
use yii\db\Migration;

class m150826_074001_create_orders_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('orders', [
            'id' => 'pk',
            'text' => Schema::TYPE_TEXT,
            'image' => Schema::TYPE_STRING,
            'sort' => Schema::TYPE_INTEGER,
        ]);

         $this->insert('orders', [
            'text' => 'Вы можете позвонить нам, приехать в офис, отправить письмо по e-mail или запросить консультацию прямо с этого сайта.',
            'image' => 'order_1.png',
            'sort' => 1,
        ]);

         $this->insert('orders', [
            'text' => 'Для просчета необходима следующая информация:<br>
                        1. Тираж (кол-во изделий)<br>
                        2. Материал на котором будет печать<br>
                        3. Кол-во цветов<br>
                        4. Тиснение или другой вид обработки после печати',
            'image' => 'order_2.png',
            'sort' => 2,
        ]);

         $this->insert('orders', [
            'text' => 'Для печать нам необходим макет, если у Вас его нет, мы можем предложить наши услуги по его изготовлению',
            'image' => 'order_3.png',
            'sort' => 3,
        ]);

         $this->insert('orders', [
            'text' => 'Если сроки изготовления и цена Вас устроили, делаете предоплату и мы приступаем к работе',
            'image' => 'order_4.png',
            'sort' => 4,
        ]);

         $this->insert('orders', [
            'text' => 'Как только мы получаем подтверждение оплаты, уточняем сроки и сразу приступаем к работе.',
            'image' => 'order_5.png',
            'sort' => 5,
        ]);
    }

    public function safeDown()
    {
        $this->delete('orders', ['id' => 5]);
        $this->delete('orders', ['id' => 4]);
        $this->delete('orders', ['id' => 3]);
        $this->delete('orders', ['id' => 2]);
        $this->delete('orders', ['id' => 1]);
        $this->dropTable('orders');
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
