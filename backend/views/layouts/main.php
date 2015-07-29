<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

//$this->registerCssFile('@web/css/ace-rtl.css', ['depends'=>'backend\assets\AppAsset']);
//$this->registerCssFile('@web/css/ace-skins.css', ['depends'=>'backend\assets\AppAsset']);
//$this->registerCssFile('@web/css/ace.css', ['depends'=>'backend\assets\AppAsset']);
//$this->registerCssFile('@web/css/calculator.css', ['depends'=>'backend\assets\AppAsset']);
//$this->registerJsFile('@web/scripts/admin.js', ['depends'=>'backend\assets\AppAsset']);
//$this->registerCssFile('@web/css/font-awesome.css', ['depends'=>'backend\assets\AppAsset']);

$this->registerCssFile('@web/beoro/js/lib/jquery-ui/css/Aristo/Aristo.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/img/icsw2_16/icsw2_16.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/img/splashy/splashy.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/img/flags/flags.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/js/lib/powertip/jquery.powertip.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('http://fonts.googleapis.com/css?family=Abel', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/css/login.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/css/beoro.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/css/admin_style.css', ['depends'=>'backend\assets\AppAsset']);


$this->registerJsFile('@web/scripts/admin.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/jquery.fademenu.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/selectnav.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/jquery.actual.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/jquery.easing.1.3.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/lib/powertip/jquery.powertip-1.1.0.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/moment.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/beoro_common.js', ['depends'=>'backend\assets\AppAsset']);

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl; ?>/favicon.ico" type="image/x-icon" />
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <div class="pull-right top-search">
                    <form action="" >
                        <input type="text" name="q" id="q-main">
                        <button class="btn"><i class="icon-search"></i></button>
                    </form>
                </div>
                <div id="fade-menu" class="pull-left">
                    <ul class="clearfix" id="mobile-nav">
                        <li>
                            <a href="javascript:void(0)">
                              <i class="menu-icon glyphicon glyphicon-edit"></i>
                              Материалы
                            </a>
                            <ul>
                                <li>
                                    <a href="<?= Url::toRoute('categories/index') ?>">
                                      Категории <b class="arrow"></b>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="<?= Url::toRoute('posts/index') ?>">
                                      Материалы <b class="arrow"></b>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::toRoute('news/index') ?>">
                                      Новости <b class="arrow"></b>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::toRoute('pages/index') ?>">
                                      Отдельные страници <b class="arrow"></b>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= Url::toRoute('carusel/index') ?>">
                                      Карусель <b class="arrow"></b>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="dropdown-toggle" href='<?= Url::toRoute('collback/index') ?>'>
                              <i class="menu-icon glyphicon glyphicon-earphone"></i>

                              <span class="menu-text">Заказы звонка</span>
                            </a>
                        </li>
                        <li>
                          <a class="dropdown-toggle" href='<?= Url::toRoute('feedback/index') ?>'>
                              <i class="menu-icon glyphicon glyphicon-envelope"></i>
                              <span class="menu-text">Заказы консультации</span>
                          </a>
                        </li>
                        <li>
                          <a class="dropdown-toggle" href='<?= Url::toRoute(['calculator/calculator']) ?>'>
                            <i class="glyphicon glyphicon-calculator"></i>
                            <span class="menu-text">Калькулятор</span>
                          </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
      
      <header>
        <div class="container">
          <div class="row">
            <div class="span3">
              <div class="main-logo">
                <a href="<?= Yii::$app->homeUrl ?>">
                  <?= Html::img('@web/beoro/img/beoro_logo.png') ?>
                </a>
              </div>
            </div>
            <div class="span5">
              <nav class="nav-icons">
                                <ul>
                                    <li><a href="<?= Yii::$app->homeUrl ?>" class="ptip_s"><i class="icsw16-home"></i></a></li>
                                    <li><a href="<?= Url::toRoute('posts/create') ?>" class="ptip_s" title="Создать материал"><i class="icsw16-create-write"></i></a></li>
                                    <li><a href="#" class="ptip_s" title="Mailbox"><i class="icsw16-mail"></i><span class="badge badge-info">6</span></a></li>
                                    <li><a href="#" class="ptip_s" title="Comments"><i class="icsw16-speech-bubbles"></i><span class="badge badge-important">14</span></a></li>
                                    <li class="active"><span class="ptip_s" title="Statistics (active)"><i class="icsw16-graph"></i></span></li>
                                    <li><a href="#" class="ptip_s" title="Settings"><i class="icsw16-cog"></i></a></li>
                                </ul>
                             </nav>

            </div>
            <div class="span4">
              <div class="user-box">
                <div class="user-box-inner">
                  <?= Html::img('@web/beoro/img/avatars/avatar.png', ['class' => "user-avatar img-avatar"]) ?>
                  <div class="user-info">
                      <?php if(Yii::$app->user->isGuest) { ?>
                    
                    
                    
                   
                    
                    
                    <ul class="unstyled">
                      <li><a href="<?= Url::toRoute(['site/login']) ?>">Login</a></li>
                    </ul>
                      <?php } else { ?>
                    Добро пожаловать, 
                    <strong><?= Yii::$app->user->identity->username ?></strong>
                    <ul class="unstyled">
                      <li><a href="<?= Url::toRoute(['site/logout']) ?>" data-method="post">Выход</a></li>
                    </ul> 
                      <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>

        <div class="container">
        
          <div class="main-container">
  <!--<div id="sidebar" class="sidebar responsive " data-sidebar="true" data-sidebar-scroll="true" data-sidebar-hover="true">
    <ul class='nav nav-list'>

      <li class='droopdown'>
        <a class="dropdown-toggle" href='#'>
          <i class="menu-icon fa fa-desktop"></i>
          <span class="menu-text">Материалы</span>
          <b class="arrow fa fa-angle-down"></b>
        </a>
        <ul class='submenu'>
          <li>
            <a href="<?= Url::toRoute('categories/index') ?>">
              <i class="menu-icon fa fa-caret-right"></i>
              Категории <b class="arrow"></b>
            </a>
          </li>
          <li>
            <a href="<?= Url::toRoute('posts/index') ?>">
              <i class="menu-icon fa fa-caret-right"></i>
              Материалы <b class="arrow"></b>
            </a>
          </li>
          <li>
            <a href="<?= Url::toRoute('carusel/index') ?>">
              <i class="menu-icon fa fa-caret-right"></i>
              Карусель <b class="arrow"></b>
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a class="dropdown-toggle" href='<?= Url::toRoute('collback/index') ?>'>
          <i class="menu-icon glyphicon glyphicon-earphone"></i>
          <span class="menu-text">Заказы звонка</span>
        </a>
      
      </li>
      <li>
        <a class="dropdown-toggle" href='<?= Url::toRoute('feedback/index') ?>'>
          <i class="menu-icon glyphicon glyphicon-earphone"></i>
          <span class="menu-text">Заказы консультации</span>
        </a>
      
      </li>
      <li>
        <a class="dropdown-toggle" href='<?= Url::toRoute(['calculator/calculator']) ?>'>
          <i class="menu-icon fa fa-pencil-square-o"></i>
          <span class="menu-text">Калькулятор</span>
        </a>
      
      </li>
    </ul>
  </div>-->
  
 
  
  
            <div class='main-content'>
              <div class="main-content-inner">
                <div class="breadcrumbs">
                 
            <div class="container">
               <?= Breadcrumbs::widget(['options' => ['id' => 'breadcrumbs'], 'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], ]) ?>
            </div>
                </div>
                <div class="container">
                  <?= $content ?>
                </div>
              </div>
            </div>
</div>
          
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
