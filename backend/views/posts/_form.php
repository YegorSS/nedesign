<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;
use yii\helpers\Url;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model backend\models\Posts */
/* @var $form yii\widgets\ActiveForm */

$this->registerCssFile('@web/css/admin_style.css', ['depends'=>'backend\assets\AppAsset']);
?>

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data',
                      'class' => 'form-horizontal',
                     ]]); ?>
  
  
  <ul class="nav-beoro" style='border: none'>
        <li class="active"><a href="#home" data-toggle="tab">Основная информация</a></li>
        <li><a href="#image" data-toggle="tab">Изображения</a></li>
  </ul>
<!-- Tab panes -->
<div class="tab-content panel">
  <div class="tab-pane fade in active" id="home">
  
 
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

<label class="col-sm-2 control-label right">Keywords</label>
<div class="col-sm-10">
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>
  
<label class="col-sm-2 control-label right">Description</label>
<div class="col-sm-10">
    <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'size' => 121])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Описание цен</label>
<div class="col-sm-10">
    <?= $form->field($model, 'price')->widget(CKEditor::className(), [
'options' => ['rows' => 6],
'preset' => 'standart',
'clientOptions' => [
'filebrowserUploadUrl' => 'url',
],
])->label(false) ?>
</div>

<label class="col-sm-2 control-label right">Теги</label>
<div class="col-sm-10">
    <?= $form->field($model, 'tegs')->textArea()->label(false) ?>
</div>
  
<label class="col-sm-2 control-label right">Калькулятор</label>
<div class="col-sm-10">
   <?= $form->field($model, 'product_id')
  ->dropDownList(ArrayHelper::map($products, 'id', 'title'))->label(false) ?>
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

    <label class="col-sm-2 control-label right">Минимальный заказ</label>
    <div class="col-sm-10">
      <?= $form->field($model, 'minorder')->textInput(['maxlength' => true])->label(false) ?>
    </div>

    <label class="col-sm-2 control-label right">Опубликовать?</label>
    <div class="col-sm-10">
      <?= $form->field($model, 'active')->checkbox(['label' => false])->label(false) ?>
    </div>
  </div>

  <div class="tab-pane fade" id="image">
          
  <?php Pjax::begin(); ?>
  <?php
    if(empty($model->mainimage)){ ?>
      <label class="col-sm-2 control-label right">Главная картинка</label>
      <div class="col-sm-10">  
        <?= $form->field($model, 'mainimage')->fileInput()->label(false); ?>
      </div> 
    <?php }  else { ?>
      <div class='col-sm-2 right' style='margin-bottom: 15px;'>Главная картинка</div>
      <div class="col-sm-10" style="margin-bottom: 15px;">
        <?= $model->mainimage; ?> - <?= Html::a('X', ['posts/deletemainimage', 'id' => $model->id]); ?>
      </div>
    <?php } ?>
  
    <?php Pjax::end(); ?>
    
    <label class="col-sm-2 control-label right">Картинки</label>
    <div class="col-sm-10" style='margin-bottom: 15px;'>
      <?= $form->field($postimage, 'image[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(false) ?>

      <?php Pjax::begin(); ?>
      <?php foreach($model->postimage as $image): ?>
         <?= $image->image ?> - <?= Html::a('X', ['posts/deleteimage', 'id' => $image->id]) ?><br>
       <?php endforeach; ?>
      <?php Pjax::end(); ?>
    </div>    
  </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  

