<?php
/* @var $this yii\web\View */
$this->title = $news->title;
$this->registerMetaTag(['keywords' => $news->keywords]);
$this->registerMetaTag(['description' => $news->description]);

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
$this->params['breadcrumbs'][] = ['label' => $news->catagories->header_meny, 'url' => ['site/category', 'id' => $news->catagories->id], 'itemprop' => "url"];
$this->params['breadcrumbs'][] = $news->title;
?>



<?= $this->render('_catalog', ['categories' => $categories]) ?>
<div class="content-holder">

<div class="container">
<div class="row">
  <div class="span12" style='margin: 15px'>
    <section class="title-section">
      <h1 itemprop="headline" class="title-header"><?= $news->h_1 ?></h1>
      <h2 itemprop="alternativeHeadline" style="padding-bottom: 15px; font-size: 14px"><?= $news->h_2 ?></h2>      
    </section>
  </div>
</div>
<div class="row">

    
  
<div class="span8" style='margin: 0px' itemprop="articleBody">
    
     
        <?= $news->text ?>
       
         
       
     
   
   
  <?php if(!empty($lastposts)) { ?>
  <div class="related products" style="margin-left: -15px">
    <h2>Просмотренная продукция:</h2>
    
    <ul class="products">
      <?php $i = 0; ?>
      <?php foreach($lastposts as $lastpost): ?>
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
       <a href="<?= Url::toRoute(['site/post', 'alias' => $lastpost->alias]) ?>">
          <div class="product-link-wrap">
            <?= Html::img('@web/uploads/post/main/155/155'.$lastpost->mainimage,['width' => 155, 'height' => 155]) ?>
            <strong><?= $lastpost->header_menu ?></strong>
          </div>
       </a>
      </li>
      <?php endforeach; ?>
      <div class="clear"></div>
    </ul>
    
  </div>
  
    <?php } ?>
    
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



 <?= $this->render('_footer',['page' => $news, 'type' => 'news']) ?>
 

