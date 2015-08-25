<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile('@web/css/admin_style.css', ['depends'=>'backend\assets\AppAsset']);
?>


    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data',
                      'class' => 'form-horizontal',
                     ]]); ?>

  <label class="col-sm-2 control-label right">Имя</label>
<div class="col-sm-10">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
</div>

  <label class="col-sm-2 control-label right">Компания</label>
<div class="col-sm-10">
    <?= $form->field($model, 'company')->textInput(['maxlength' => true])->label(false) ?>
</div>
  
<label class="col-sm-2 control-label right">Email</label>
<div class="col-sm-10">
    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Телефон</label>
<div class="col-sm-10">
    <?= $form->field($model, 'tel')->textInput(['maxlength' => true])->label(false) ?>
</div> 

<label class="col-sm-2 control-label right">Сообщние</label>
<div class="col-sm-10">
    <?= $form->field($model, 'coment')->textarea()->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Страница</label>
<div class="col-sm-10">
    <?= $form->field($model, 'post')->textInput(['maxlength' => true])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Обработано</label>
<div class="col-sm-10">
    <?= $form->field($model, 'processed')->checkbox(['label' => false])->label(false) ?>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'fixBottom btn-success' : 'fixBottom btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


