<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = $page->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $page->description]);

$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_catalog', ['categories' => $categories]); ?>


<!--<div class="content-holder" itemscope itemtype="http://schema.org/Product">-->
<div class="content-holder">
<div class="container">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <section class="title-section">
      <h1 class="title-header"><?= $page->h_1 ?></h1>
      <?= ($page->h_2) ? '<h2 style="padding-bottom: 15px; font-size: 14px">' .  $page->h_2 . '</h2>' : '<br>' ?>
    </section>
  </div>
</div>
<br>
  
<div class="row">
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style='margin-left: -15px; margin-top: 20px'>
<?= $page->text ?>

</div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar">
    <?= $this->render('_top', ['topposts' => $topposts]) ?>
    <?= $this->render('_collbackForm', ['collback' => $collback]) ?>
    <?= $this->render('_feedbackForm', ['feedback' => $feedback]) ?>
  </div>
</div>

</div>
</div>

 <?= $this->render('_footer',['page' => $page, 'type' => 'page']) ?>