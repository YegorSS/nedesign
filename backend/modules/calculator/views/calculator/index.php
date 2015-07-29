<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Технологическая карта:';
?>
<h1><?= Html::encode($this->title) ?></h1>


<div class="col-md-8">
  <?php foreach($products as $product): ?>
  <a href='<?= Url::toRoute(['result', 'id' => $product->id]); ?>'><?= $product->title ?></a><br>
  <?php endforeach; ?>
<hr>
<a href='<?= Url::toRoute(['createproduct']); ?>'>Добавить продукт</a>
</div>

<div class="col-md-2">
</div>

<div class='col-md-2'>
  
</div>
