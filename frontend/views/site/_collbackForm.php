<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
?>
<div class='h2'>Заказать звонок</div>
<?php

$form = ActiveForm::begin([
    'action' => 'site/createcollback',
    'id' => 'collback-form',
    'options' => ['class' => ''],
]) ?>
    <?= $form->field($collback, 'name') ?>
    <?= $form->field($collback, 'tel')->widget(MaskedInput::className(), [
      'mask' => '(999) 999-99-99',
  ])->textInput(['placeholder' => 'Введите номер телефона']) ?>
    <div class="form-group">
        <div class="">
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>


