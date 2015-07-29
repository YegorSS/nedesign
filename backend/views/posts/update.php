<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */

$this->title = 'Update Posts: ' . ' ' . $model->header_meny;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->header_meny, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="w-box w-box-blue">
  <div class="w-box-header">
    <h4><?= Html::encode($this->title) ?></h4>
  </div>
  <div class="w-box-content cnt_a">
    <?= $this->render('_form', [
        'model' => $model,
        'categories' => $categories,
        'products' => $products,
        'postimage' => $postimage,
    ]) ?>
  </div>
</div>
