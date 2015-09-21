<?php $this->title = 'Страница пользователя';
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->registerMetaTag(['name' => 'description', 'content' => '']);

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>

<?= $this->render('../site/_catalog', ['categories' => $categories]); ?>

<div class="content-holder">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="title-section">
          <h1 class="title-header">Страница пользователя</h1>
          <br>
        </section>
      </div>
    </div>

    <div class="row" style='margin-left: -15px; margin-top:40px;'>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <h2>История заказов:</h2>
      </div>
    </div>
  </div>
</div>

<?= $this->render('../site/_footer') ?>