<?php
/* @var $this yii\web\View */
$this->title = $category->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $category->keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $category->description]);

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->params['breadcrumbs'][] = $category->header_meny;
?>



<?= $this->render('_catalog', ['categories' => $categories]); ?>


<div class="content-holder">
<div class="container">
  <div class="row">
  <div class="span12" style='margin: 15px'>
    <section class="title-section">
      <h1 class="title-header"><?= $category->title ?></h1>
      <h2 style="padding-bottom: 15px; font-size: 14px"><?= $category->h_2 ?></h2>
    </section>
  </div>
</div>
<div class="row">
<div class="span8" style='margin: 0px'>
    


<?= $category->text ?>
<br>
<br>



<?php if($category->type == 'post'): ?>

    <ul class="products">
      <?php $i = 0; ?>
      <?php foreach($posts as $post): ?>
      <li class="product 
          
      <?php $i++; 
      
        if ($i == 1){
          echo 'first';
        }
        if ($i == 4){
          echo 'last';
          $i = 0;
        }
      
      ?>">
       <a href="<?= Url::toRoute(['site/post', 'alias' => $post->alias]) ?>">
          <div class="product-link-wrap">
            <?= Html::img('@web/uploads/post/main/155/155'.$post->mainimage, ['style' => 'width:155px !important; height:155px !important']) ?>
            <strong><?= $post->header_meny ?></strong>
          </div>
       </a>
      </li>
      <?php endforeach; ?>
    </ul>
      <?= LinkPager::widget([
        'pagination' => $pages,
        ]); ?>
 <?php elseif($category->type == 'news') : ?>
  <?php foreach($posts as $news): ?>
    <article>
      <header class="post-header">
      <h3 class='post-title'>
        <?= Html::a($news->h_1, ['site/news', 'alias' => $news->alias]) ?>
      </h3>
      </header>
      <?php if(preg_match ('/<img.*>/Uis', $news->text, $out)){ ?>
      <figure class="featured-thumbnail thumbnail ">
        <?= $out[0] ?>
        
      </figure>
      <?php } ?>
      <div class="post_content">
        <p>
        <?= mb_substr(strip_tags($news->text), 0, 200, 'UTF-8') . "..." ?>
        </p>
        <p><span class='glyphicon glyphicon-time'></span> <?= date_create($news->created)->Format('Y-m-d') ?></p>
        <?= Html::a('Подробнее', ['site/news', 'alias' => $news->alias], ['class' => 'btn btn-primary']) ?>
        <div class='clear'></div>
      </div>
    </article>
  <?php endforeach ?>
  <?= LinkPager::widget([
        'pagination' => $pages,
        ]); ?>
 <?php endif ?>
  
  
  
  

</div>
  <div class="span4 sidebar">
    <?= $this->render('_top', ['topposts' => $topposts]) ?>
    <?= $this->render('_collbackForm', ['collback' => $collback]) ?>
    <?= $this->render('_feedbackForm', ['feedback' => $feedback]) ?>
    <?= $this->render('_newsBlock') ?>
  </div>
</div>
</div>
</div>


 <?= $this->render('_footer',['page' => $category, 'type' => 'category']) ?>
 

