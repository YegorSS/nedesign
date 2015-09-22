<?php
use common\models\Kurs;
use common\models\Orders;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

$orders = new Orders
?>
      
      
      
      

  
  <div class="radio_buttons">
    <div>
          <input type='radio' class='variant' name='variant_id' value='0' id="variant0"><label for='variant0'>Все</label><br>
    </div>
          <?php foreach($product->variants as $variant): ?>
    <div>
          <input type='radio' class='variant' name='variant_id' value='<?= $variant->id ?>' id='variant<?= $variant->id ?>'> <label for='variant<?= $variant->id ?>'><?= $variant->title ?></label>
    </div>
        <?php endforeach; ?>
  </div>
 


  <div style='clear: both'></div>

    
  <br>
  <?php foreach($product->size as $size): ?>
  <div class='radio_buttons size variant<?= $size->variant_id ?>'>
  <div class="radio_buttons">
    <input type='radio' class='size variant<?= $size->variant_id ?>' name='size_id' value='<?= $size->id ?>' id='size<?= $size->id ?>'> <label for='size<?= $size->id ?>'><?= $size->title ?></label>
    
  </div>
  </div>
  
  <?php endforeach; ?>
  <div style='clear: both'></div>
  <br>

  <?php foreach($product->size as $size): ?>
    <?php foreach($size->colors as $color): ?>
      <div class='radio_buttons color size<?= $color->size_id ?>'>
        <div class="radio_buttons">
        <input type='radio' class='color size<?= $color->size_id ?>' name='color_id' value='<?= $color->prices['price'] ?>' id='color<?= $color->id ?>'><label for='color<?= $color->id ?>'><?= $color->title ?></label>
        
        </div>
      </div>
    <?php endforeach; ?>
  <?php endforeach; ?>
  <div style='clear: both'></div>
  <br>
  <div id='colorQTY' class='unvisible'>
    
  Количество:<br>
  <!--<div class='qty'></div> -->
  <input type="button" value="-" id="minusQ" class="minus">
  <input type='number' name='quantity' class='quantityInput' id='quantityInput' min="50" max="10000" step="50" value='50' style='width: 75px'>
  <input type="button" value="+" id="addQ" class="plus">
  <br><br>
  Количество цветов (сторона 1 : сторона 2)<br>
  <input type="button" value="-" id="minus1" class="minus">
  <input type='number' name='colorQuantity1' class='colorQuantity1' max='9' min='1' value='1' style='width: 50px'>
  <input type="button" value="+" id="add1" class="plus">
  
  :
  
  <input type="button" value="-" id="minus2" class="minus">
  <input type='number' name='colorQuantity1' class='colorQuantity2' max='9' min='0' value='0' style='width: 50px'>
  <input type="button" value="+" id="add2" class="plus">
  <br><br>
  
      <?php $i = 0; ?>
  <?php foreach($product->relations as $relation): ?>
    <?php foreach($relation->services->prices as $price): ?>
    <?php if($price->product_id == $product->id || $price->product_id == 0 ){ ?>
      <?php if($price->service_id !== 3 && $price->service_id !== 2 ){ ?>
      <div class='checkbox_buttons'>
        <div class="checkbox_buttons">
          <input id="serv<?= $i ?>" type="checkbox" class="serv" value="
        <?php if($relation->services['unit']){
          echo '(' . $price->price . ' *  quantity)';
        }else{
          echo $price->price;
        }
        ?>
             ">
          <label for='serv<?= $i ?>'><?= $relation->services['title'] ?></label>
    
        </div>
      </div>
      <?php
      
         $i += 1;
         
        } ?>
    <?php } ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
  <div class="clear"></div>

<br>


<?php $i = 0; ?>
<?php foreach($product->matrelations as $matrelation): ?>
  <div class="checkbox_buttons" style='display: inline'>
<input id="dopserv<?= $i ?>" type="checkbox" class="dopserv" value="( <?= $matrelation->materials->workprice ?> * quantity)">
<label for='dopserv<?= $i ?>'><?= $matrelation->materials->title ?></label>
</div>

      <div id='matcount<?= $i ?>' class='unvisible'>
        <div style='display: inline-block; padding: 10px'>
          <p>Длинна, см:</p>
          <input id='matshir<?= $i ?>' type='number' class='matquantity' value='1' style='width: 50px'>
        </div>
        <div style='display: inline-block; padding: 10px'>
          <p>Высота, см:</p>
          <input id='matvys<?= $i ?>' type='number' class='matquantity' value='1' style='width: 50px'>
        </div>
      </div>
<br>
<?php $i += 1; ?>
<?php endforeach ?>






<br>


  
  <button id='check' style='float:left' class='btn btn-primary'>Расчитать</button>
  <div id='sum' class='unvisible'>
    <div id="odometer" class="odometer" style='font-size: 27px; margin-left: 10px;'></div> грн.
  </div>

 
  </div>
  <br>
 
<div id='form_orders' class='unvisible'>
  <?php $form = ActiveForm::begin([
    'action' => 'site/createorder',
]) ?>
    <?= $form->field($orders, 'name')->textInput(['value' => isset(Yii::$app->user->identity->fio) ? Yii::$app->user->identity->fio : false])->label('Ваше Имя *') ?>
    <?= $form->field($orders, 'telephone')->widget(MaskedInput::className(), [
      'mask' => '(999) 999-99-99',
  ])->textInput(['placeholder' => 'Введите номер телефона', 'value' => isset(Yii::$app->user->identity->telephone) ? Yii::$app->user->identity->telephone : false])->label('Телефон *') ?>
    <?= $form->field($orders, 'mail')->textInput(['value' => isset(Yii::$app->user->identity->email) ? Yii::$app->user->identity->email : false])->label('E-mail *') ?>
    <?= $form->field($orders, 'details')->hiddenInput()->label(false) ?>
    <?= $form->field($orders, 'user_id')->hiddenInput(['value' => isset(Yii::$app->user->identity->id) ? Yii::$app->user->identity->id : false])->label(false) ?>
    <div class="form-group">
        <div class="">
            <?= Html::submitButton('Заказать', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>
</div>



    
    
    
<div style="display: none">
  <input id="products-formula" value="<?= $product->formula ?>">
  <?php foreach($product->relations as $relation): ?>
    <?php foreach($relation->services->prices as $price): ?>
    <?php if($price->product_id == $product->id || $price->product_id == 0){ ?>
  
    
    
  <input class="form-control price sizew<?= $price->size['id'] ?> service<?= $relation->services['id'] ?>" value="<?= $price->price ?>" >
    
    
  
    <?php } ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
</div>

<script>
var material = [];
var dopworkprice = [];
<?php $i = 0 ?>
    <?php foreach($product->matrelations as $matrelations): ?>
      material[<?= $i ?>] = <?= $matrelations->materials->price ?>;
      dopworkprice[<?= $i ?>] = <?= $matrelations->materials->workprice ?>;
      <?php $i += 1 ?>
    <?php endforeach ?>
var materialsKurs = <?= Kurs::findOne(1)->materials ?>;
var worksKurs = <?= Kurs::findOne(1)->works ?>;
var productName = '<?= $product->title ?>';
</script>
  
      


      
      
      