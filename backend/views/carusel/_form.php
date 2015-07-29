<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
  use kartik\file\FileInput;
  use yii\helpers\Url;
  use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Carusel */
/* @var $form yii\widgets\ActiveForm */
  

?>
<?php $url = '../../frontend/web/uploads/carusel/'; ?>
<div class="carusel-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    
    <label class="col-sm-2 control-label right">Название</label>
    <div class="col-sm-10">
      <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label(false) ?>
    </div>
  
  
  
   <?php Pjax::begin(); ?>
  <?php
  
  if(empty($model->image)){ ?>
  <label class="col-sm-2 control-label right">Изображение</label>
<div class="col-sm-10">  
   <?= $form->field($model, 'image')->fileInput()->label(false); ?>
  </div> 
  <?php }  else { ?>
  <div class='col-sm-2 right' style='margin-bottom: 15px;'>Картинка</div>
  <div class="col-sm-10" style="margin-bottom: 15px;">
    <?= $model->image; ?> - <?= Html::a('X', ['carusel/deleteimage', 'id' => $model->id]); ?>
  </div>
  <?php } ?>
  
  <?php Pjax::end(); ?>

<label class="col-sm-2 control-label right">Активировать?</label>
<div class="col-sm-10"> 
    <?= $form->field($model, 'active')->checkbox()->label(false) ?>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
