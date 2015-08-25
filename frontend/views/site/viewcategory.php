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
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <section class="title-section">
          <h1 class="title-header"><?= $category->title ?></h1>
          <?= ($category->h_2) ? '<h2 style="padding-bottom: 15px; font-size: 14px">' .  $category->h_2 . '</h2>' : '<br>' ?>
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style='margin-left: -15px; margin-top: 20px'>
        <?= $category->text ?><br><br>

        <?php if($category->type == 'post'): ?>
          <ul class="products">
            <?php $i = 0; ?>
            <?php foreach($posts as $post): ?>
              <li class="product">
                <a href="<?= Url::toRoute(['site/post', 'alias' => $post->alias]) ?>">
                  <div class="product-link-wrap">
                    <?= Html::img('@web/uploads/post/main/155/155'.$post->mainimage, ['title' => $post->titlemainimage, 'alt' => $post->altmainimage, 'width' => '155px', 'height' => '155px']) ?>
                    <strong><?= $post->header_meny ?></strong>
                  </div>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
          <?= LinkPager::widget(['pagination' => $pages,]); ?>
        <?php elseif($category->type == 'news') : ?>
          <?php foreach($posts as $news): ?>
            <div>
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
            </div>
          <?php endforeach ?>
          <?= LinkPager::widget(['pagination' => $pages,]); ?>
        <?php endif ?>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar">
        <?= $this->render('_top', ['topposts' => $topposts]) ?>
        <?= $this->render('_collbackForm', ['collback' => $collback]) ?>
        <?= $this->render('_feedbackForm', ['feedback' => $feedback]) ?>
        <?= $this->render('_newsBlock') ?>
      </div>
    </div>
  </div>
</div>


 <?= $this->render('_footer',['page' => $category, 'type' => 'category']) ?>
 

