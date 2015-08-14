<?php
/* @var $this yii\web\View */
$this->title = $page->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $page->description]);

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;

$this->registerCssFile('@web/owl-carousel/owl.carousel.css', ['depends'=>'frontend\assets\AppAsset']);
$this->registerCssFile('@web/owl-carousel/owl.theme.css', ['depends'=>'frontend\assets\AppAsset']);
$this->registerJsFile('@web/owl-carousel/owl.carousel.js', ['depends'=>'frontend\assets\AppAsset']);
$this->registerJsFile('@web/owl-carousel/owl_carusel_index.js', ['depends'=>'frontend\assets\AppAsset']);
?>

<?= $this->render('_catalog', ['categories' => $categories]); ?>


<div class="content-holder">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="title-section">
          <h1 class="title-header"><?= $page->h_1 ?></h1>
          <?= ($page->h_2) ? '<h2 style="padding-bottom: 15px; font-size: 14px">' .  $page->h_2 . '</h2>' : '<br>' ?>
        </section>
      </div>
    </div>
    <div class="row">
      <div id="carousel-example-generic" class="carousel slide col-lg-12 col-md-12 col-sm-12 col-xs-12" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators hidden-xs hidden-sm">
          <?php $i = 0; ?>
          <?php foreach($carusel as $item): ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" <?php if($i == 0) echo 'class="active"'; ?>></li>
            <?php $i++; ?>
          <?php endforeach; ?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <?php $i = 0; ?>
          <?php foreach($carusel as $item): ?>
            <div data-target="#myCarousel" class="item <?php if($i == 0) echo 'active'; ?>">
              <?= Html::img('@web/uploads/carusel/img/'.$item->image) ?>
              <div class="carousel-caption">
                <?= $item->title ?>
              </div>
            </div>
            <?php $i++; ?>
          <?php endforeach; ?>
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
        </div>
      </div>
    </div>
    <div class="row"><br>
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="featured_wrap">
          <div class="extra-wrap">
            <div class="banner-wrap featured-banners type-1">
              <a href="#" class="banner_main_link">
                <h5>Full Color</h5>
                <p>Excepteur sint occaecat cupidatat non proident sunt </p>
              </a>
            </div> 
            <div class="banner-wrap featured-banners type-2">
              <a href="#" class="banner_main_link">
                <h5>Instant</h5>
                <p>Excepteur sint occaecat cupidatat non proident sunt </p>
              </a>
            </div> 
          </div>
          <div class="extra-wrap">
            <div class="banner-wrap featured-banners type-3">
              <a href="#" class="banner_main_link">
                <h5>Executive</h5>
                <p>Excepteur sint occaecat cupidatat non proident sunt </p>
              </a>
            </div> 
            <div class="banner-wrap featured-banners type-4">
              <a href="#" class="banner_main_link">
                <h5>1-2 Color</h5>
                <p>Excepteur sint occaecat cupidatat non proident sunt </p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php foreach($categories->where(['type' => 'post'])->all() as $category): ?>
          <h3><?= $category->title ?>:</h3>
          <div class="home_featured">
            <ul id="owl-demo" class="owl-carousel owl-theme products" style='margin-left: 0px !important;'>
              <?php foreach($category->posts as $post): ?>
                <?php if($post->active) { ?>
                  <li class="item product" style='width: 99%; margin-left: 0px !important;'>
                    <div class="home_featured">
                      <a href="<?= Url::toRoute(['site/post', 'alias' => $post->alias]) ?>">
                        <div class="product-link-wrap">
                          <?= Html::img('@web/uploads/post/main/200/200'.$post->mainimage) ?>
                          <strong><?= $post->header_meny ?></strong>
                        </div>
                      </a>
                    </div>
                  </li>
                <?php } ?>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach ?>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
<?= $this->render('_footer',['page' => $page, 'type' => 'page']) ?>
 
