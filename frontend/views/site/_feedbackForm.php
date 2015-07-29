<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
?>
<div class='h2'>Заказать консультацию</div>
<?php
$form = ActiveForm::begin([
    'action' => 'site/createfeedback',
    'id' => 'feedback-form',
    'options' => ['class' => ''],
]) ?>
    <?= $form->field($feedback, 'name')->textInput()->label('Ваше имя *') ?>

    <?= $form->field($feedback, 'company')->textInput()->label('Компания') ?>

    <?= $form->field($feedback, 'email')->textInput()->label('E-mail *') ?>

    <?= $form->field($feedback, 'coment')->textarea()->label('Сообщение') ?>

    <?= $form->field($feedback, 'tel')->widget(\yii\widgets\MaskedInput::className(), [
      'mask' => '(999) 999-99-99',
  ])->textInput(['placeholder' => 'Введите номер телефона'])->label('Телефон') ?>
    <div class="form-group">
        <div class="">
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>