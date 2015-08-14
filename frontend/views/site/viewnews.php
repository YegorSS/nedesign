<?php
/* @var $this yii\web\View */
$this->title = $news->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $news->keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $news->description]);

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;


$this->registerJsFile('@web/scripts/calc.js', ['depends'=>'frontend\assets\AppAsset']);
$this->registerCssFile('@web/css/calc.css', ['depends'=>'frontend\assets\AppAsset']);
$this->registerCssFile('@web/css/prettyPhoto.css', ['depends'=>'frontend\assets\AppAsset']);
$this->registerCssFile('@web/css/odometer-theme-plaza.css', ['depends'=>'frontend\assets\AppAsset']);
$this->registerJsFile('@web/scripts/jquery.prettyPhoto.js', ['depends'=>'frontend\assets\AppAsset']);
$this->registerJsFile('@web/scripts/odometer.js', ['depends'=>'frontend\assets\AppAsset']);


//$this->params['breadcrumbs'][] = 'Новости';
$this->params['breadcrumbs'][] = ['label' => $news->categories->header_meny, 'url' => ['site/category', 'id' => $news->categories->id], 'itemprop' => "url"];
$this->params['breadcrumbs'][] = $news->title;
?>

<?= $this->render('_catalog', ['categories' => $categories]) ?>
<div class="content-holder">

<div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <section class="title-section">
      <h1 class="title-header"><?= $news->h_1 ?></h1>
      <h2 style="padding-bottom: 15px; font-size: 14px"><?= $news->h_2 ?></h2>      
    </section>
  </div>
</div>
<div class="row">
  
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style='margin-left: -15px; margin-top: 20px'>
        <?= $news->text ?>
       
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

 <?= $this->render('_footer',['page' => $news, 'type' => 'news']) ?>
 

