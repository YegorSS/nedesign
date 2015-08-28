<?php
use yii\helpers\Html;
use common\models\Car_orders;

$car_orders = Car_orders::find()->orderBy('sort')->all();
$i = 1;
?>
<div class='h2'>Как оформить заказ:
  <!-- Controls -->
  <div style='float: right; display: inline'>
    <a href="#carousel-order" data-slide="prev" style='text-decoration: none;'>
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a href="#carousel-order" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
</div>

<div id="carousel-order" class="carousel slide" data-ride="carousel" style='width: auto; min-height: 200px;'>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php foreach($car_orders as $car_order): ?>
      <div class="item <?= ($i == 1) ? 'active' : false ?>">
      <p>Шаг <?= $i ?></p>
          <?= Html::img('@web/uploads/car_orders/'.$car_order->image, ['style' => 'float: left; width: 60px; margin: 0 10px 10px 0;']) ?>
          <?= $car_order->text ?>
      </div>
      <?php $i++; ?>
   <?php endforeach ?>
  </div>
  <ol class="carousel-indicators">
    <li data-target="#carousel-order" data-slide-to="0" class="active" style='background-color: #939393;'></li>
    <li data-target="#carousel-order" data-slide-to="1" style='background-color: #939393;'></li>
    <li data-target="#carousel-order" data-slide-to="2" style='background-color: #939393;'></li>
    <li data-target="#carousel-order" data-slide-to="3" style='background-color: #939393;'></li>
    <li data-target="#carousel-order" data-slide-to="4" style='background-color: #939393;'></li>
  </ol>

</div>
