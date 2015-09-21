<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\AuthAssignment;
use yii\helpers\ArrayHelper;
use common\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
$this->registerCssFile('@web/css/admin_style.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/assets/f7a8a83/js/bootstrap.js', ['depends'=>'backend\assets\AppAsset']);

$roles = AuthItem::find()->all();

?>


    <?php $role = AuthAssignment::find()->where(['user_id' => $_GET['id']])->one();?>


	<?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data',
                      'class' => 'form-horizontal',
                     ]]); ?>




    <label class="col-sm-2 control-label right">Доступ</label>
		<div class="col-sm-10">
			<?= $form->field($role, 'item_name')->dropDownList(ArrayHelper::map($roles, 'name', 'name'))->label(false) ?>
		</div>

	<label class="col-sm-2 control-label right">Имя пользователя</label>
		<div class="col-sm-10">
			<?= $form->field($model, 'username')->textInput()->label(false) ?>
		</div>

	<label class="col-sm-2 control-label right">Email</label>
		<div class="col-sm-10">
			<?= $form->field($model, 'email')->textInput()->label(false) ?>
		</div>

    <div class="form-group">
        <?= Html::submitButton( 'Update', [ 'btn-primary fixBottom']) ?>
    </div>

    <?php ActiveForm::end(); ?>
