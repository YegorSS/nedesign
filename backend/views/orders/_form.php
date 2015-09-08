<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data',
                      'class' => 'form-horizontal',
                     ]]); ?>

<label class="col-sm-2 control-label right">Имя</label>
<div class="col-sm-10">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Телефон</label>
<div class="col-sm-10">
    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">E-mail</label>
<div class="col-sm-10">
    <?= $form->field($model, 'mail')->textInput(['maxlength' => true])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Детали</label>
<div class="col-sm-10">
    <?= $form->field($model, 'details')->textarea(['rows' => 6])->label(false) ?>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'fixBottom btn-success' : 'fixBottom btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
