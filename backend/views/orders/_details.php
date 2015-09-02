<?php $array = json_decode($details, true); ?>

<p><?= $array['product'] ?></p>
<p><?= $array['variant'] ?></p>
<p><?= $array['size'] ?></p>
<p><?= $array['color'] ?></p>
<p>Цвета: <?= $array['colorQuantity1'] ?> x <?= $array['colorQuantity2'] ?></p>
<p>Тираж: <?= $array['quantity'] ?></p>
<p>Услуги: <?php for($i = 0; $i < count($array['serv']); $i++){	echo $array['serv'][$i].', ';}  ?></p>
<p>Доп. материалы: </p>
<?php for($i = 0; $i < count($array['dopserv']); $i++){
	echo '<p>' . $array['dopserv'][$i]['name'] . ' - ' . $array['dopserv'][$i]['shir'] . ' x ' . $array['dopserv'][$i]['vys'] . '</p>';
	}
?>
<p>Сумма заказа: <?= $array['price'] ?> грн.</p>


