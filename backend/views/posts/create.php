<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Posts */

$this->title = 'Create Posts';
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


  
<div class="w-box w-box-orange">
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



