<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en-US"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en-US"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="<?= Yii::$app->language ?>"> <!--<![endif]-->
<head>
<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

<style type="text/css">body{background-color:#fff}.header{background-color:#383838}</style>
<style type='text/css'>h1{font:normal 25px/32px Open Sans;color:#383838;}h2{font:normal 22px/26px Open Sans;color:#383838;}h3{font:normal 19px/24px Open Sans;color:#383838;}h4{font:normal 16px/20px Open Sans;color:#383838;}h5{font:normal 13px/20px Open Sans;color:#383838;}h6{font:normal 13px/20px Open Sans;color:#383838;}.main-holder{font:normal 13px/20px Open Sans;color:#939393;}.logo_h__txt,.logo_link{font:normal 37px/42px Open Sans;color:#ffffff;}.sf-menu>li>a{font:normal 14px/34px Open Sans;color:#383838;}.nav.footer-nav a{font:normal 13px/20px;color:#999999;}</style>
<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
	</div>
	<![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->


<!--<![endif]-->
 <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
</head>
<body class="home page page-id-203 page-template page-template-page-home-php has_jigoshop has_shop">
  <?php $this->beginBody() ?>
<div id="motopress-main" class="main-holder">
  
 <header class="motopress-wrapper header">
<div class="container">
<div class="row">
<div>
<div class="row">
<div class="span6">
 
<div class="logo pull-left">
  <a href="<?= Url::home() ?>" class="logo_h logo_h__img"><?= Html::img('@web/img/logo.png') ?>
  </a>
<p class="logo_tagline"></p> 
</div>
  <div class='head-title'>Полиграфия</div>
  <?= $this->render('../site/_searchform') ?>
</div>
<div class="span6">
  <div class="shop-nav">
    
  </div>
</div>
</div>
  
<div class="nav-row">
<div class="row broad">
<div class="span12" style='height: 20px'>
  <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                          'homeLink' => ['label' => '1Design®', 'url' => ['/'], 'itemprop' => "url"],
                          'itemTemplate' => "<li itemscope itemtype='https://data-vocabulary.org/Breadcrumb'><span itemprop='title'>{link}</span></li>",
                          ]) ?>
</div>
</div>
</div>
  
  
</div>
</div>
</div>
</header>

  

  
  
  <?= Alert::widget() ?>
        <?= $content ?>
 
</div>

<?php $this->endBody() ?>
<script>
var siteurl = "<?= Url::home() ?>";
</script>
</body>
</html>
<?php $this->endPage() ?>




