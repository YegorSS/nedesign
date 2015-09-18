<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\AuthAssignment;
use yii\helpers\ArrayHelper;
use common\models\AuthItem;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */

$roles = AuthItem::find()->all();

?>

<div class="user-form">


    <?php $role = AuthAssignment::find()->where(['user_id' => $_GET['id']])->one();?>


	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($role, 'item_name')->dropDownList(ArrayHelper::map($roles, 'name', 'name'))->label('Доступ') ?>

    <div class="form-group">
        <?= Html::submitButton( 'Update', [ 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
