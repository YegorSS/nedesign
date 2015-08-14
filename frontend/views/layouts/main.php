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

<div>
<div class="row">
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs" style='margin-left: -15px'>
 
<div class="logo pull-left" style='margin-bottom:-55px'>
  <a href="<?= Url::home() ?>" class="logo_h logo_h__img"><?= Html::img('@web/img/logo.png') ?>
  </a>
</div>
</div>
<div class='col-lg-7 col-md-6 col-sm-6'>
  <div class='head-title'>Полиграфия</div>
  <?= $this->render('../site/_searchform') ?>
</div>





<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
  <div class="social pull-right">
    <a itemprop="sameAs" class="twitter" href="https://twitter.com/1DESIGN_ltd" rel="nofollow">
        <i class="fa fa-twitter"></i>
    </a>
    <a itemprop="sameAs" class="facebook" href="https://www.facebook.com/1Design.org" rel="nofollow">
        <i class="fa fa-facebook"></i>
    </a>
    <a itemprop="sameAs" class="gplus" href="https://plus.google.com/+1designOrgTM/posts" rel="nofollow">
        <i class="fa fa-google-plus"></i>
    </a>
    <?= Html::a('<i class="fa fa-rss"></i>', $url = ['site/rss', 'type' => isset($this->params['model']) ? $this->params['model'] : false , 'id' => isset($this->params['id']) ? $this->params['id'] : false] ) ?>
  </div>
 </div>



</div>
  
<div class="nav-row">
<div class="row broad">
<div class='col-lg-2 col-md-3 col-sm-3 hidden-xs'>
</div>
<div class='col-lg-10 col-md-9 col-sm-9' style='height: 14px;'>
  <?= Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                          'homeLink' => ['label' => '1Design®', 'url' => ['/'], 'itemprop' => "url"],
                          'itemTemplate' => "<li itemscope itemtype='https://data-vocabulary.org/Breadcrumb'><span itemprop='title'>{link}</span></li>",
                          ]) ?>

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





