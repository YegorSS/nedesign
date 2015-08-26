<?php
/* @var $this yii\web\View */
$this->title = $post->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $post->keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $post->description]);

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\assets\PostsAsset;


PostsAsset::register($this);





$this->params['breadcrumbs'][] = ['label' => $post->categories->header_meny, 'url' => ['category', 'id' => $post->categories->id], 'itemprop' => "url"];
$this->params['breadcrumbs'][] = $post->header_meny;
?>



<?= $this->render('_catalog', ['categories' => $categories]) ?>

<div class="content-holder" itemscope itemtype="http://schema.org/Product">
  <meta itemprop="name" content="<?= $post->header_meny ?>">
  <meta itemprop="brand" content="1Design®">
<div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <section class="title-section">
      <h1 class="title-header"><?= $post->h_1 ?></h1>
      <br>
    </section>
  </div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8" style='margin-left: -15px'>

 
  <div id="post-1900" class="post-1900 product type-product status-publish hentry">
    <div class="row">
    <div class="images col-xs-6">
      <a href="<?= Url::to('@web/uploads/post/main/'.$post->mainimage) ?>" class="zoom" data-rel="prettyPhoto" title='<?= $post->title ?>'>
        <?= Html::img('@web/uploads/post/main/300/300'.$post->mainimage, ['title' => $post->titlemainimage, 'alt' => $post->altmainimage, 'itemprop' => "image", 'width' => '300px', 'height' => '300px']) ?>
      </a>
      


      <div id="owl-thumb" class="thumbnails">
        <?php foreach($post->postimage as $postimage): ?>
          <div class="item">
            <a data-rel="prettyPhoto[product-gallery]" href="<?= Url::to('@web/uploads/post/images/' . $postimage->image) ?>" class="zoom" title='<?= $post->title ?>'>
              <?= Html::img('@web/uploads/post/images/90/90'.$postimage->image, ['alt' => $postimage->alt, 'title' => $postimage->title, 'class' => "attachment-90x90", 'width' => '60px', 'height' => '60px']) ?>
            </a>
          </div>
        <?php endforeach ?>
      </div>

    </div>
      
      
      
      
    <div class="summary col-xs-6">
      
    
      
      
<?php if($product){
echo $this->render('_calculator', [
          'product' => $product,
          'services' => $services,
          ]);
}
     ?>
      
      
      
    </div>
    </div>
    
    <div style="margin-left: -15px">
      <ul class="nav nav-tabs tabs" style='border: none'>
        <li class="active"><a href="#home" data-toggle="tab">Описание</a></li>
        <?php if(!empty($post->price)){ ?>
          <li><a href="#price" data-toggle="tab">Цены</a></li>
        <?php } ?>
        <li><a href="#messages" data-toggle="tab" onclick='comments()'>Вопросы</a></li>
        <li style="float:right"><a href="#settings" data-toggle="tab">Доставка</a></li>
        <li style="float:right"><a href="#profile" data-toggle="tab">Оплата</a></li>
      </ul>
<div class="clear"></div>
      <!-- Tab panes -->
      <div class="tab-content panel">
        <div class="tab-pane fade in active" id="home" itemprop="description">
          <?= ($post->h_2) ? '<h2 style="padding-bottom: 15px; font-size: 14px">' .  $post->h_2 . '</h2>' : false ?>
          <?= $post->text ?>
          <?php if($post->tegs): ?>
          <div>
          <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo">
            Теги
          </button>
          <div id="demo" class="collapse">
          <?php 
            $tegs = explode(",", $post->tegs);
            foreach($tegs as $teg){
              echo '<a href="'.str_replace(" ", "-", $teg).'">'.$teg.'</a> / ';
            }
          ?>
          </div>
          </div>
        <?php endif; ?>
        </div>
        <div class="tab-pane fade" id="price"><?= $post->price ?></div>
        <div class="tab-pane fade" id="profile"><h4>Оплата в компании ООО «1Дизайн» производится по безналичному расчету</h4></div>
        <div class="tab-pane fade" id="messages"><div id="hypercomments_widget"></div>
<script type="text/javascript">
  function comments(){
_hcwp = window._hcwp || [];
_hcwp.push({widget:"Stream", widget_id: 61067});
(function() {
if("HC_LOAD_INIT" in window)return;
HC_LOAD_INIT = true;
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || "en").substr(0, 2).toLowerCase();
var hcc = document.createElement("script"); hcc.type = "text/javascript"; hcc.async = true;
hcc.src = ("https:" == document.location.protocol ? "https" : "http")+"://w.hypercomments.com/widget/hc/61067/"+lang+"/widget.js";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();}
</script>
<!-- <a href="http://hypercomments.com" class="hc-link" title="comments widget">comments powered by HyperComments</a>--></div> 
        <div class="tab-pane fade" id="settings">
          <h4>Компания «1Дизайн» доставит Ваш заказ в города:</h4>

А/П Борисполь, Александрия, Алушта, Алчевск, Ахтырка, Белая Церковь, Белгород-Днестровский, Бердичев, Бердянск, Бершадь, Борисполь, Боярка, Бровары, Васильков, Винница, Владимир-Волынский, Вознесенск, Волочиск, Глухов, Горловка, Горохов, Дебальцево, Джанкой, Днепродзержинск, Днепропетровск, Донецк, Дрогобыч, Евпатория, Житомир, Запорожье, Ивано-Франковск, Измаил, Изюм, Ильичевск, Каменец-Подольский, Каховка, Керч, Киев, Кировоград, Ковель, Коломыя, Конотоп, Коростень, Котовск, Краматорск, Кременчуг, Кривое Озеро, Кривой Рог, Кролевец, Лубны, Луганск, Луцк, Львов, Любашевка, Макаров, Макеевка, Малин, Мариуполь, Мелитополь, Мена, Миргород, Мукачево, Нежин, Николаев, Никополь, Нововолынск, Новоград - Волынский, Обухов, Одесса, Павлоград, Первомайск, Переяслав-Хмельницкий, Пирятин, Полтава, Прилуки, Рава-Русская, Радехов, Ровно, Ромны, Севастополь, Северодонецк, Симферополь, Славутич, Славянск, Смела, Стрий, Сумы, Тернополь, Ужгород, Ульяновка, Умань, Фастов, Феодосия, Харьков, Херсон, Хмельницкий, Хорол, Червоноград, Черкассы, Чернигов, Черновцы, Чугуев, Шостка, Южноукраинск, Ялта</div>
      </div>
    </div>
    <br>
  <?php if(!empty($lastposts)) { ?>
  <div class="related products" style="margin-left: -15px">
    <h2>Просмотренная продукция:</h2>
    
    <ul class="products">
      <?php foreach($lastposts as $lastpost): ?>
      <li class="product">
       <a href="<?= Url::toRoute(['site/post', 'alias' => $lastpost->alias]) ?>">
          <div class="product-link-wrap">
            <?= Html::img('@web/uploads/post/main/155/155'.$lastpost->mainimage,['width' => '155px', 'height' => '155px', 'title' => $lastpost->titlemainimage, 'alt' => $lastpost->altmainimage]) ?>
            <strong><?= $lastpost->header_meny ?></strong>
          </div>
       </a>
      </li>
      <?php endforeach; ?>
    </ul>
      
    
  </div>
  
    <?php } ?>
    
  </div>
</div>
  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 sidebar">
    <?= $this->render('_top', ['topposts' => $topposts]) ?>
    <?= $this->render('_order_block') ?>
    <?= $this->render('_collbackForm', ['collback' => $collback]) ?>
    <?= $this->render('_feedbackForm', ['feedback' => $feedback]) ?>
    <?= $this->render('_newsBlock') ?>
    
  </div>
</div>
</div>
</div>



 <?= $this->render('_footer',['page' => $post, 'type' => 'post']) ?>
 

