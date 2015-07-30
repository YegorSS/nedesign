<?php
use yii\helpers\Html;
use common\models\News;

$news = News::find()->where(['active' => true])->all();
$i = true;
?>
<div class='h2'>Новости:
  <!-- Controls -->
  <div style='float: right; display: inline'>
  <a href="#carousel-example-generic" data-slide="prev" style='text-decoration: none;'>
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a href="#carousel-example-generic" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  </div>
</div>
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style='width: auto; min-height: 160px;'>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  	<?php foreach($news as $oneNews): ?>
    	<div class="item <?= ($i) ? 'active' : false ?>">
    		<div>
    	  		<h4>
              <?= Html::a($oneNews->title, ['site/news', 'alias' => $oneNews->alias]) ?>
            </h4>
    	  		<p><span class='glyphicon glyphicon-time'></span> <?= date_create($oneNews->created)->Format('Y-m-d') ?></p>
    	  		<p><?= mb_substr(strip_tags($oneNews->text), 0, 200, 'UTF-8') . "..." ?></p>
    	  	</div>
    	</div>
    	<?php $i = false; ?>
	<?php endforeach ?>
  </div>
  

</div>