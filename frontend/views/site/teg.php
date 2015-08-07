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
$this->params['breadcrumbs'][] = ['label' => $post->catagories->header_meny, 'url' => ['site/category', 'id' => $post->catagories->id], 'itemprop' => "url"];
$this->params['breadcrumbs'][] = $tegname;
?>



<?= $this->render('_catalog', ['categories' => $categories]) ?>
<div class="content-holder">

<div class="container">
<div class="row">
  <div class="span12" style='margin: 15px'>
    <section class="title-section">
      <h1 itemprop="headline" class="title-header"><?= $tegname ?></h1>
      <h2 style="padding-bottom: 15px; font-size: 14px"><?= $post->h_1 ?></h2>   
    </section>
  </div>
</div>
<div class="row">

    
  
<div class="span8" style='margin: 0px' itemprop="articleBody">
       
         
       <article class="post-71 post type-post status-publish format-standard hentry category-uncategorized post__holder cat-1-id">
      
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
    </article>
 
  </div>

  <div class="span4 sidebar">
    <?= $this->render('_top', ['topposts' => $topposts]) ?>
    <?= $this->render('_collbackForm', ['collback' => $collback]) ?>
    <?= $this->render('_feedbackForm', ['feedback' => $feedback]) ?>
    
  </div>
</div>
</div>
</div>



 <?= $this->render('_footer',['page' => $post, 'type' => 'post']) ?>