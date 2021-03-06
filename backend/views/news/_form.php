<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('@web/css/admin_style.css', ['depends'=>'backend\assets\AppAsset']);
?>



    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data',
                      'class' => 'form-horizontal',
                     ]]); ?>

<label class="col-sm-2 control-label right">Title</label>
<div class="col-sm-10">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">H 1</label>
<div class="col-sm-10">
    <?= $form->field($model, 'h_1')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">H 2</label>
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

<label class="col-sm-2 control-label right">Alias</label>
<div class="col-sm-10">
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Категория</label>
<div class="col-sm-10">
  <?= $form->field($model, 'category_id')
  ->dropDownList(ArrayHelper::map($categories, 'id', 'title'))->label(false) ?>
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

<label class="col-sm-2 control-label right">Дата публикации</label>
<div class="col-sm-10">
    <?= $form->field($model, 'created')->textInput(['value' => date("Y-m-d H:i:s")])->label(false) ?>
</div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Изменить', ['class' => $model->isNewRecord ? 'fixBottom btn-success' : 'fixBottom btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


