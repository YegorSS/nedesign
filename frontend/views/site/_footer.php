<?php
use kartik\rating\StarRating;
use yii\helpers\Url;
?>

<div id="about" itemscope itemtype="https://schema.org/Organization">
  <meta itemprop="name" content='1Дизайн - 1Design'>
  <meta itemprop="brand" content="1Design®">
  <meta itemprop="founder" content="Владимир Соловьев">
  <meta itemprop="description" content='Полиграфия Киев. Дизайн-студия 1Дизайн®'>
  <link itemprop="url" href="<?= \Yii::$app->urlManager->createAbsoluteUrl('/') ?>">
  <link itemprop="logo" href="<?= \Yii::$app->urlManager->createAbsoluteUrl('img/logo.png') ?>"> 
  <link itemprop="sameAs" href="https://twitter.com/1DESIGN_ltd">
  <link itemprop="sameAs" href="https://www.facebook.com/1Design.org">
  <link itemprop="sameAs" href="https://plus.google.com/+1designOrgTM/postsd">
  <div itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
      <meta itemprop="addressCountry" content='Украина'>
      <meta itemprop="addressLocality" content='г. Киев'>
      <meta itemprop="streetAddress" content='просп. Московский 11, оф. 205'>
  </div>
  <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
      <meta itemprop="telephone" content='+38 044 500 25 11'>
      <meta itemprop="contactType" content='customer service'>
  </div>
  <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
      <meta itemprop="telephone" content='+38 0800 21 25 11'>
      <meta itemprop="contactType" content='sales'>
  </div>
  <meta itemprop="telephone" content='+38 044 500 25 11'>


</div>

<footer class="footer" itemscope itemtype="https://schema.org/WPFooter">
  <div class="container">
    <div class="row"> 
      <div class="footer-widgets-wrap">
        <div class="row footer-widgets">
          <div class='span4'>
            <p>
              Украина, г. Киев, <br>
              просп. Московский 11, оф. 205
            </p>
          </div>
          <div class="span4">
            <div class="raiting">
              <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                <meta itemprop="ratingValue" content="<?= $page->rate / $page->voites ?>">
                <meta itemprop="reviewCount" content="<?= $page->voites ?>">
                <meta itemprop="worstRating" content="1">
                <meta itemprop="bestRating" content="5">
              </div>
              <div style="text-align: center">
                <?= StarRating::widget([
                  'name' => 'rating_1',
                  'value' => round($page->rate / $page->voites, 2),
                  'id' => 'rrr',
                  'pluginOptions' => [
                    'min' => 0,
                    'max' => 5,
                    'step' => 1,
                    'showClear' => false,
                    'showCaption' => false,
                    'defaultCaption' => 'Ваша оценка - {rating}',
                    'starCaptions'=>[]
                    //'disabled' =>true,
                  ],
                ]) ?>
                <span style='font-size:10px'>
                  Рейтинг: <?= round($page->rate / $page->voites, 2) ?>. Голосов: <?= $page->voites ?>.
                </span>
              </div>
              <script>
              var funcrating = '$.ajax({type: "post", url: "<?= Url::to("rating") ?>", data: "rate=" + $(this).val() + "&id=<?= $page->id ?>&type=<?= $type ?>"})';
              </script>
            </div>
          </div>
        <div class='span4'>
          <a class="pull-right" href="http://www.1design.net" style="text-align: right" title="Создание сайтов 1Design">
            Создание сайта 1Design®
          </a>
        </div>
        </div>
      </div>
      <div class="row copyright">
        <div class="span12" style='text-align: right;'>
          2009-<?= date('Y') ?>. Все права защищены 1Design®
        </div>
      </div>
    </div>
  </div>
</footer>
<div id="toTop">
<p id="back-top" style="display: block;">
<a href='#'>
<span></span>
</a>
</p>
</div>