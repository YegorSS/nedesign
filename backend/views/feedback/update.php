<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = 'Update Feedback: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="w-box w-box-blue">
  <div class="w-box-header">
    <h4><?= Html::encode($this->title) ?></h4>
  </div>
  <div class="w-box-content cnt_a">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
  </div>
</div>
