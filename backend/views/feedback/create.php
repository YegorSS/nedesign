<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Feedback */

$this->title = 'Create Feedback';
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="w-box w-box-orange">
  <div class="w-box-header">
    <h4><?= Html::encode($this->title) ?></h4>
  </div>
  <div class="w-box-content cnt_a">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

  </div>
</div>
