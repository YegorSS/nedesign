<?php
use yii\helpers\Html;
use yii\helpers\Url;
use kartik\rating\StarRating;
?>

<div class="visible-all-devices widget">
      <div class='h2'>Популярная продукция:</div>
      <ul class="product_list_widget">
        
      <?php foreach($topposts as $post): ?>
        <li>
          <a href="<?= Url::toRoute(['site/post', 'alias' => $post->alias]) ?>">
            <?= Html::img('@web/uploads/post/main/65/65'.$post->mainimage, ['style' => 'width:65px !important; height:65px !important']) ?>
            <span class="js_widget_product_title"><?= $post->header_meny ?></span>
          </a>
          
           <!-- <span style="width:72px">
              <span class="rating">4.50</span>
              out of 5
            </span>
            <b class="rate_content">
              Rated 4.50 out of 5
            </b>-->
            <?= StarRating::widget([
    'name' => 'rating_'. $post->id,
    'value' => $post->rate / $post->voites,
    'pluginOptions' => [
        'min' => 1,
        'max' => 5,
        'step' => 1,
        'showClear' => false,
        'showCaption' => false,
        'readonly' => true,
    ],
]) ?>
         
        <span class="js_widget_product_price">
          <span class="from">Минимальный заказ:</span>
            <?= $post->minorder ?> шт.
          </span>
        </li>
        
      <?php endforeach; ?>
      </ul>
</div>