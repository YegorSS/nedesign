<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
?>
<div class='h2'>Заказать звонок</div>
<?php

$form = ActiveForm::begin([
    'action' => '@web/site/createcollback',
    'id' => 'collback-form',
    'options' => ['class' => ''],
]) ?>
    <?= $form->field($collback, 'name')->textInput(['value' => isset(Yii::$app->user->identity->fio) ? Yii::$app->user->identity->fio : false]) ?>
    <?= $form->field($collback, 'tel')->widget(MaskedInput::className(), [
      'mask' => '(999) 999-99-99'])->textInput(['placeholder' => 'Введите номер телефона', 'value' => isset(Yii::$app->user->identity->telephone) ? Yii::$app->user->identity->telephone : false]) ?>
    <?= $form->field($collback, 'user_id')->hiddenInput(['value' => isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : false])->label(false) ?>
  <div id='time'></div>
    <div class="form-group">
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>
<script>
    var servDate = "<?= date('F d, Y H:i:s') ?>";

</script>

