<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Update User: ' . ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="w-box w-box-blue">
  <div class="w-box-header">
    <h4><?= Html::encode($this->title) ?></h4>
  </div>
<div class="w-box-content cnt_a">

    <?= $this->render('_form',['model' => $model]) ?>
</div>
</div>
