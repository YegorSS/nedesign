<?php

use yii\db\Schema;
use yii\db\Migration;

class m150727_061358_create_pages_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('pages', [
            'id' => 'pk',
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'header_meny' => Schema::TYPE_STRING . ' NOT NULL',
            'h_1' => Schema::TYPE_STRING . ' NOT NULL',
            'h_2' => Schema::TYPE_STRING,
            'keywords' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_STRING,
            'alias' => Schema::TYPE_STRING . ' NOT NULL',
            'text' => Schema::TYPE_TEXT,
            'rate' => Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 5',
            'voites' => Schema::TYPE_INTEGER . ' NOT NULL  DEFAULT 1',
            'active' => Schema::TYPE_BOOLEAN,
        ]);

        $this->insert('pages', [
            'title' => 'Полиграфия Киев Дизайн студия Полиграфические услуги ООО 1Дизайн®',
            'header_meny' => 'Главная',
            'h_1' => 'ПОЛИГРАФИЯ В КИЕВЕ ОТ 1DESIGN®',
            'h_2' => 'Полиграфия – невозможное делает возможным',
            'keywords' => 'полиграфия, полиграфия киев, дизайн студия, полиграфия в киеве, печать полиграфия, полиграфия печать, полиграфия украина, полиграфия в украине, 1design',
            'description' => 'Полиграфия Киев. Дизайн студия. 1Design® Полиграфические услуги от типографии ООО 1Дизайн®',
            'text' => 'Печать визиток ...',
            'alias' => 'index',
            'active' => true,
        ]);

        $this->insert('pages', [
            'title' => 'Контакты',
            'header_meny' => 'Контакты',
            'h_1' => 'Контакты',
            'keywords' => 'полиграфия, полиграфия киев, дизайн студия, полиграфия в киеве, печать полиграфия, полиграфия печать, полиграфия украина, полиграфия в украине, 1design',
            'description' => 'Полиграфия Киев. Дизайн студия. 1Design® Полиграфические услуги от типографии ООО 1Дизайн®',
            'text' => '<div class="row">
        <div class="span3" style="margin: 0px;">
            <h3>Адрес ООО "1Дизайн"</h3>
            <div class="subtitle">Украина, г. Киев 04073, просп. Московский, 11, оф. 205</div>
        </div>
        <div class="span3" style="margin: 0px;">
            <h3>Номера телефонов ООО "1Дизайн"</h3>
            <div class="subtitle">+38 044 500 25 11(факс)</div>
      <div class="subtitle">0800 21 25 11</div>
        </div>
        <div class="span3" style="margin: 0px;">
            <h3>E-mail</h3>
            <div class="subtitle">IN@1DESIGN.ORG</div>
        </div>
    
  
  
    <div class="span3" style="margin: 0px;">
            <h3>Координаты для GPS навигатора</h3>
            <div class="subtitle">50°29′20″ с.ш., 30°28′49″ в.д.</div>
        </div>
  
</div>
<br>
<div class="row">
    
        <div class="span12" style="margin: 0px;">
            <h3>Проложить маршрут в OOO "1Дизайн"</h3>

            <div class="contacts">
                <select id="select" name="select_mode" class="form-control">
                    <option selected="selected" value="0">Выберите тип</option>
                    <option value="1">Геолокация</option>
                    <option value="2">Ввести место нахождения</option>
                </select>
                <br>
                <div class="geolocate">
                    <form>
                        <div class="form-group">
                            <select id="travel_mode" name="travel_mode" class="form-control">
                                <option selected="selected" value="driving">На автомобиле</option>
                                <option value="transit">Общественным транспортом</option>
                                <option value="walking">Пешком</option>
                            </select>
                        </div>
                        <button id="start_travel" type="submit" class="btn btn-default button">Проложить маршрут</button>
                    </form>
                </div>

                <div class="geocode">
                    <form id="geocoding_form" method="post">
                        <div class="form-group">
                            <label for="address">Ваш адрес:</label>
                            <input type="text" class="form-control" id="address" placeholder="Найти">
                        </div>
                        <button type="submit" class="btn btn-default button">Найти</button>
                    </form>
                </div>
                <br>
                <div class="geocode">
                    <form>
                        <div class="form-group">
                            <select id="travel_mode2" name="travel_mode" class="form-control">
                                <option selected="selected" value="driving">На автомобиле</option>
                                <option value="transit">Общественным транспортом</option>
                                <option value="walking">Пешком</option>
                            </select>
                        </div>
                    <button id="start_travel2" type="submit" class="btn btn-default button">Проложить маршрут</button>
                    </form>
                </div>
            </div>

            <div class="popin">
                <div id="map">&nbsp;</div>
            </div>
            <ul id="instructions"></ul>
        </div>
    
</div>',
            'alias' => 'contact',
            'active' => true,
        ]);

        $this->insert('pages', [
            'title' => 'Полиграфия Киев Дизайн студия Полиграфические услуги ООО 1Дизайн®',
            'header_meny' => 'О компании',
            'h_1' => 'Дизайн студия 1Design®',
            'keywords' => 'полиграфия, полиграфия киев, дизайн студия, полиграфия в киеве, печать полиграфия, полиграфия печать, полиграфия украина, полиграфия в украине, 1design',
            'description' => 'Полиграфия Киев. Дизайн студия. 1Design® Полиграфические услуги от типографии ООО 1Дизайн®',
            'text' => '',
            'alias' => 'about',
            'active' => true,
        ]);
    }

    public function safeDown()
    {
        $this->delete('pages', ['id' => 3]);
        $this->delete('pages', ['id' => 2]);
        $this->delete('pages', ['id' => 1]);
        $this->dropTable('pages');
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
