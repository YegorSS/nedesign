<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = $page->title;
$this->registerMetaTag(['keywords' => $page->keywords]);
$this->registerMetaTag(['description' => $page->description]);
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('https://maps-api-ssl.google.com/maps/api/js?sensor=false', ['depends'=>'frontend\assets\AppAsset']);
$this->registerJsFile('@web/scripts/gmaps.js', ['depends'=>'frontend\assets\AppAsset']);
?>
 <?= $this->render('_catalog', ['categories' => $categories]); ?>

<div class="content-holder">
<div class="container">
  <div class="row">
  <div class="span12" style='margin: 15px'>
    <section class="title-section">
      <h1 class="title-header"><?= $page->h_1 ?></h1>
      <h2 style="padding-bottom: 15px; font-size: 14px"><?= $page->h_2 ?></h2>
    </section>
  </div>
</div>
  <br>
<div class="row">
		<div class="span3" style='margin: 0px;'>
			<h3>Адрес ООО "1Дизайн"</h3>
			<div class="subtitle">Украина, г. Киев 04073, просп. Московский, 11, оф. 205</div>
		</div>
		<div class="span3" style='margin: 0px;'>
			<h3>Номера телефонов ООО "1Дизайн"</h3>
			<div class="subtitle">+38 044 500 25 11(факс)</div>
      <div class="subtitle">0800 21 25 11</div>
		</div>
		<div class="span3" style='margin: 0px;'>
			<h3>E-mail</h3>
			<div class="subtitle">IN@1DESIGN.ORG</div>
		</div>
	
  
  
    <div class="span3" style='margin: 0px;'>
			<h3>Координаты для GPS навигатора</h3>
			<div class="subtitle">50°29′20″ с.ш., 30°28′49″ в.д.</div>
		</div>
  
</div>
<br>
<div class='row'> 
	
		<div class='span12' style='margin: 0px;'>
			<h3>Проложить маршрут в OOO "1Дизайн"</h3>

			<div class="contacts">
				<select id="select" name="select_mode" class="form-control">
					<option selected="selected" value="0">Выберите тип</option>
					<option value="1">Геолокация</option>
					<option value="2">Ввести место нахождения</option>
				</select>
				<br>
				<div class="geolocate">
					<form>
						<div class='form-group'>
							<select id="travel_mode" name="travel_mode" class="form-control">
								<option selected="selected" value="driving">На автомобиле</option>
								<option value="transit">Общественным транспортом</option>
								<option value="walking">Пешком</option>
							</select>
						</div>
						<button id="start_travel" type="submit" class="btn btn-default button">Проложить маршрут</button>
					</form>
				</div>

				<div class="geocode">
					<form id="geocoding_form" method="post">
						<div class="form-group">
							<label for="address">Ваш адрес:</label>
							<input type="text" class="form-control" id="address" placeholder="Найти">
						</div>
						<button type="submit" class="btn btn-default button">Найти</button>
					</form>
				</div>
				<br>
				<div class="geocode">
					<form>
						<div class="form-group">
							<select id="travel_mode2" name="travel_mode" class="form-control">
								<option selected="selected" value="driving">На автомобиле</option>
								<option value="transit">Общественным транспортом</option>
								<option value="walking">Пешком</option>
							</select>
						</div>
					<button id="start_travel2" type="submit" class="btn btn-default button">Проложить маршрут</button>
					</form>
				</div>
			</div>

			<div class="popin">
				<div id="map">&nbsp;</div>
			</div>
			<ul id="instructions"></ul>
		</div>
	
</div>
</div>
</div>


 <?= $this->render('_footer',['page' => $page, 'type' => 'page']) ?>
 

