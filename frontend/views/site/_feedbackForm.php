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
    <?= $form->field($feedback, 'name')->textInput(['value' => isset(Yii::$app->user->identity->fio) ? Yii::$app->user->identity->fio : false])->label('Ваше имя *') ?>

    <?= $form->field($feedback, 'company')->textInput(['value' => isset(Yii::$app->user->identity->company) ? Yii::$app->user->identity->company : false])->label('Компания') ?>

    <?= $form->field($feedback, 'email')->textInput(['value' => isset(Yii::$app->user->identity->email) ? Yii::$app->user->identity->email : false])->label('E-mail *') ?>

    <?= $form->field($feedback, 'coment')->textarea()->label('Сообщение') ?>

    <?= $form->field($feedback, 'tel')->widget(\yii\widgets\MaskedInput::className(), [
      'mask' => '(999) 999-99-99',
  ])->textInput(['placeholder' => 'Введите номер телефона', 'value' => isset(Yii::$app->user->identity->telephone) ? Yii::$app->user->identity->telephone : false])->label('Телефон') ?>
  <?= $form->field($feedback, 'user_id')->hiddenInput(['value' => isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : false])->label(false) ?>
  
    <div class="form-group">
        
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
        
    </div>
<?php ActiveForm::end() ?>