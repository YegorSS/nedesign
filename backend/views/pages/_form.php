<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile('@web/css/admin_style.css', ['depends'=>'backend\assets\AppAsset']);
?>



    <?php $form = ActiveForm::begin(['options' => ['class' => 'form-horizontal']]); ?>


<label class="col-sm-2 control-label right">Title</label>
<div class="col-sm-10">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Заголовок в меню</label>
<div class="col-sm-10">
    <?= $form->field($model, 'header_meny')->textInput(['maxlength' => true])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">H1</label>
<div class="col-sm-10">
    <?= $form->field($model, 'h_1')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">H2</label>
<div class="col-sm-10">
    <?= $form->field($model, 'h_2')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Keywords</label>
<div class="col-sm-10">
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>
  
<label class="col-sm-2 control-label right">Description</label>
<div class="col-sm-10">
    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Alias</label>
<div class="col-sm-10">
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Текст</label>
<div class="col-sm-10">
  <?= $form->field($model, 'text')->widget(CKEditor::className(), [
                                                                  'options' => ['rows' => 6],
                                                                  'preset' => 'standart',
                                                                  'clientOptions' => [
                                                                  'filebrowserUploadUrl' => 'url',
                                                                  ],
                                             ])->label(false) ?>
</div>

    <label class="col-sm-2 control-label right">Сумма оценок</label>
    <div class="col-sm-10">
      <?= $form->field($model, 'rate')->textInput(['maxlength' => true])->label(false) ?>
    </div>

    <label class="col-sm-2 control-label right">Ко-во проголосовавших</label>
    <div class="col-sm-10">
      <?= $form->field($model, 'voites')->textInput(['maxlength' => true])->label(false) ?>
    </div>

    <label class="col-sm-2 control-label right">Опубликовать?</label>
    <div class="col-sm-10">
      <?= $form->field($model, 'active')->checkbox(['label' => false])->label(false) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'fixBottom btn-success' : 'fixBottom btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


