<?php
/* @var $this yii\web\View */
$this->title = $tegname;
$this->registerMetaTag(['name' => 'keywords', 'content' => $tegname]);
$this->registerMetaTag(['name' => 'description', 'content' => $tegname]);

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;



//$this->params['breadcrumbs'][] = 'Новости';
$this->params['breadcrumbs'][] = ['label' => $post->categories->header_meny, 'url' => ['site/category', 'id' => $post->categories->id], 'itemprop' => "url"];
$this->params['breadcrumbs'][] = $tegname;
?>



<?= $this->render('_catalog', ['categories' => $categories]) ?>
<div class="content-holder">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <section class="title-section">
          <h1 class="title-header"><?= $tegname ?></h1>
          <h2 style="padding-bottom: 15px; font-size: 14px"><?= $post->h_1 ?></h2>   
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style='margin-left: -15px'> 
        <div><br>
          <figure class="featured-thumbnail thumbnail ">
            <?= Html::img('@web/uploads/post/main/155/155' . $post->mainimage) ?>
          </figure>
          <div class="post_content">
            <div class="excerpt">
              <?= mb_substr(strip_tags($post->text), 0, 400, 'UTF-8') . "..." ?>
            </div>
            <?= Html::a('Подробнее', ['site/post', 'alias' => $post->alias], ['class' => 'btn btn-primary']) ?>
            <div class='clear'></div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar">
        <?= $this->render('_top', ['topposts' => $topposts]) ?>
        <?= $this->render('_collbackForm', ['collback' => $collback]) ?>
        <?= $this->render('_feedbackForm', ['feedback' => $feedback]) ?>
      </div>
    </div>
  </div>
</div>
 <?= $this->render('_footer',['page' => $post, 'type' => 'post']) ?>