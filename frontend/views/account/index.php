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
      <?= Html::a('Изменить личные данные', 'update', ['class' => 'btn btn-primary']) ?><br><br>
      <h2>История заказов:</h2>

      <h3>Заказы:</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Время заказа</th>
            <th>Продукция</th>
            <th>Тип</th>
            <th>Размер</th>
            <th>Цвет</th>
            <th>Цветов</th>
            <th>Тираж</th>
            <th>Доп.услуги</th>
            <th>Доп.материалы</th>
            <th>Сумма заказа</th>
          </tr>
        </thead>
        <tbody>
          <?php $ic = 1; ?>
      <?php foreach($user->orders as $order): ?>
          <tr>
            <td><?= $ic ?></td>
            <td><?= $order->telephone ?></td>
            <td><?= $order->mail ?></td>
            <td><?= $order->created ?></td>
          
          <?php $array = json_decode($order->details, true); ?>

            <td><?= $array['product'] ?></td>
            <td><?= $array['variant'] ?></td>
            <td><?= $array['size'] ?></td>
            <td><?= $array['color'] ?></td>
            <td><?= $array['colorQuantity1'] ?> x <?= $array['colorQuantity2'] ?></td>
            <td><?= $array['quantity'] ?></td>
            <td><?php for($i = 0; $i < count($array['serv']); $i++){ echo $array['serv'][$i]. '<br>';}  ?></td>
            <td><?php for($i = 0; $i < count($array['dopserv']); $i++){
              echo $array['dopserv'][$i]['name'] . ' - ' . $array['dopserv'][$i]['shir'] . ' x ' . $array['dopserv'][$i]['vys'] . '<br>';
              }
            ?></td>
            <td><?= $array['price'] ?> грн.</td>
            <?php $ic++ ?>
          </tr>
      <?php endforeach ?>
        </tbody>
      </table>

      <h3>Заказы звонка:</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Телефон</th>
            <th>Время заказа</th>
          </tr>
        </thead>
        <tbody>
        <?php $ic = 1 ?>
      <?php foreach($user->collback as $collback): ?>
          <tr>
            <td><?= $ic ?></td>
            <td><?= $collback->tel ?></td>
            <td><?= $collback->created ?></td>
          </tr>
          <?php $ic++ ?>
      <?php endforeach ?>
        </tbody>
      </table>

      <h3>Заказы консультации:</h3>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Сообщение</th>
            <th>Время заказа</th>
          </tr>
        </thead>
        <tbody>
        <?php $ic = 1 ?>
      <?php foreach($user->feedback as $feedback): ?>
          <tr>
            <td><?= $ic ?></td>
            <td><?= $feedback->tel ?></td>
            <td><?= $feedback->email ?></td>
            <td><?= Html::encode($feedback->coment) ?></td>
            <td><?= $feedback->created ?></td>
          </tr>
          <?php $ic++ ?>
      <?php endforeach ?>
      </tbody>
      </table>


      </div>
    </div>
  </div>
</div>

<?= $this->render('../site/_footer') ?>