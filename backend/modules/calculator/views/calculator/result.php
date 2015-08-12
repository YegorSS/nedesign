<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//$this->registerCssFile('@web/css/ace-part2.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/css/ace-rtl.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/css/ace-skins.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/css/ace.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/css/calculator.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/scripts/calculator.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/css/font-awesome.css', ['depends'=>'backend\assets\AppAsset']);


/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */




$this->title = $product->title;
?>



<div class="sidebar responsive" id="sidebar">
  <?= $this->render('_catalog', ['products' => $products, 'product_id' => $product->id ]) ?>
</div>
<div class="main-content">
<div class="main-content-inner">
<div class="page-content">
  <div class="ace-settings-container">
    <a class='viewEdit'>
      <div class="btn btn-app btn-xs btn-warning ace-settings-btn">
        <span class="glyphicon glyphicon-cog"></span>
      </div>
    </a>
  </div>
  <div class="page-header"><h2><?= Html::encode($this->title) ?></h2></div>
  <div class="row">
<div class="col-md-6">
  
  Количество:<br>
  <input type="button" value="-" id="minusQ" class="minus">
  <input type='number' name='quantity' class='quantityInput' id='quantityInput' min="50" max="10000" step="50" value='50' style='width: 75px'>
  <input type="button" value="+" id="addQ" class="plus">
  
  <hr>
  <div class="radio_buttons">
    <div>
          <input type='radio' class='variant' name='variant_id' value='0' id="variant0"><label for='variant0'>Все</label><br>
    </div>
          <?php foreach($product->variants as $variant): ?>
    <div>
          <input type='radio' class='variant' name='variant_id' value='<?= $variant->id ?>' id='variant<?= $variant->id ?>'> <label for='variant<?= $variant->id ?>'><?= $variant->title ?></label>
          <a data-toggle="modal" data-target="#editvariant<?= $variant->id ?>" class='view unvisible' href="<?= Url::toRoute(['editvariant', 'id' => $variant->id]); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
          <a class='view unvisible' href="<?= Url::toRoute(['deletevariant', 'id' => $variant->id]); ?>" onclick="return confirm('Вы уверенны?!')"><i class='ace-icon fa fa-trash-o bigger-130'></i></a><br>
    </div>
        <?php endforeach; ?>
  </div>
  
  <?php foreach($product->variants as $variant): ?>
  
<!-- Modal -->
    <div class="modal fade" id="editvariant<?= $variant->id ?>" tabindex="-1" role="dialog" aria-labelledby="editvariant<?= $variant->id ?>Label" aria-hidden="true">
     <div class="modal-dialog">
          <div class="modal-content">
            
         </div>
        </div>
      </div>
<!-- /Modal -->
  <?php endforeach; ?>


  <div style='clear: both'></div>
  
  <div class="view unvisible">
    <?= $this->render('create_variantform',['product' => $product]) ?>
  </div>
    
  
  <hr>
  <?php foreach($product->size as $size): ?>
  <div class='radio_buttons size variant<?= $size->variant_id ?>'>
  <div class="radio_buttons">
    <input type='radio' class='size variant<?= $size->variant_id ?>' name='size_id' value='<?= $size->id ?>' id='size<?= $size->id ?>'> <label for='size<?= $size->id ?>'><?= $size->title ?></label>
    
  </div>
  </div>
  
  <?php endforeach; ?>
  <div style='clear: both'></div>
  <hr>

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
  <hr>

  Количество цветов (сторона 1 : сторона 2)<br>
  <input type="button" value="-" id="minus1" class="minus">
  <input type='number' name='colorQuantity1' class='colorQuantity1' max='10' min='1' style='width: 50px;' value='1'>
  <input type="button" value="+" id="add1" class="plus">
  
  :
  
  <input type="button" value="-" id="minus2" class="minus">
  <input type='number' name='colorQuantity1' class='colorQuantity2' max='10' min='0' style='width: 50px;' value='0'>
  <input type="button" value="+" id="add2" class="plus">
  <hr>
  
  
  
  
  
      <?php $i = 0; ?>
  <?php foreach($product->relations as $relation): ?>
    <?php foreach($relation->services->prices as $price): ?>
    <?php if($price->product_id == $product->id || $price->product_id == 0 ){ ?>
      <?php if($price->service_id !== 3 && $price->service_id !== 2 ){ ?>
      <input id="serv<?= $i ?>" type="checkbox" class="serv" value="
        <?php if($relation->services['unit']){
          echo '(' . $price->price . ' *  quantity)';
        }else{
          echo $price->price;
        }
         $i += 1;
        ?>
             "> - <?= $relation->services['title'] ?><br>
    
    
      <?php } ?>
    <?php } ?>
    <?php endforeach; ?>
  <?php endforeach; ?>
  
  
  
  <hr>
  
    <?php foreach($product->matrelations as $matrelations): ?>
      <?= $matrelations->materials->title ?>
      <input id='mat<?= $matrelations->materials->id ?>' type='number' class='matquantity' value='0'> * <?= $matrelations->materials->price ?>грн.
      <br><br>    
    <?php endforeach ?>


  <hr>
  <div id='sum'></div>
  <hr>
 
  
  ТИРАЖ * (КОЛ-ВО ЦВ. * ПЕЧАТН.РАБ. + СТ-ТЬ ПАКЕТА) + ПЕРВ.ПРОГОН<br>
  <div class='formula'></div>
  <hr>
  
  
  <?php $form = ActiveForm::begin(); ?>

        

    <?= $form->field($product, 'formula')->textarea($options = ['class' => 'textarea'])->label('Формула') ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-default btn-sm']) ?>
    </div>
<?php ActiveForm::end(); ?>
  <hr>
  <div class="ttt"></div>

</div>

    
    

    
<div class="col-md-3">
  <div class="widget-box transparent">
    <div class="widget-header">
      <h4 class="widget-title lighter smaller">Материалы:</h4>
    </div>
    <div class='widget-body'>
    

  <div class="view unvisible">
    <?= $this->render('create_sizeform',['product' => $product]) ?>
  </div>
  
  
  <?php foreach($product->size as $size): ?>
    
  <h4 class="smaller lighter green"><?= $size->title ?>:
        <div class='pull-right easy-pie-chart percentage'>
          <a class='view unvisible' data-toggle="modal" data-target="#editsize" href="<?= Url::toRoute(['editsize', 'id' => $size->id]); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
    
          <a class='view unvisible' href="<?= Url::toRoute(['deletesize', 'id' => $size->id]); ?>" onclick="return confirm('Вы уверенны?!')"><i class='ace-icon fa fa-trash-o bigger-130'></i></a>
        </div></h4>
    
        
    <!-- Modal -->
   <div class="modal fade" id="editsize" tabindex="-1" role="dialog" aria-labelledby="editsizeLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
       </div>
     </div>
   </div>
<!-- /Modal -->

<ul class="item-list ui-sortable">
  <li class='view unvisible clearfix ui-sortable-handle'>
   
   <div class="view unvisible">
    <?= $this->render('create_colorform',['product' => $product, 'size_id' => $size->id]) ?>
  </div>
   
  </li>
  
    <?php foreach($size->colors as $color): ?>

  <?php if(isset($color->prices)){ ?>
<li class='clearfix ui-sortable-handle'>
      <?php $form = ActiveForm::begin(['options' => [
                'onchange' => 'call('. $color->prices->id .')',
                'class' => 'form'. $color->prices->id
             ]]); ?>
  <?= $color->title ?>
  <div class="pull-right easy-pie-chart percentage"> 
      <?= $form->field($color->prices, 'price')->textInput(['class' => 'price form-control'])->label(false) ?>
  </div>
  
    <div class="widget-toolbar view unvisible">
    <a data-toggle="modal" data-target="#editcolor<?= $color->id ?>" href="<?= Url::toRoute(['editcolor', 'id' => $color->id, 'product_id' => $product->id]); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="<?= Url::toRoute(['deletecolor', 'id' => $color->id, 'product_id' => $product->id]); ?>" onclick="return confirm('Вы уверенны?!')"><i class='ace-icon fa fa-trash-o bigger-130'></i></a>
    </div>
    <?= $form->field($color->prices, 'id')->hiddenInput()->label(false) ?>
    <?php ActiveForm::end(['options' => [
                'onchange' => 'call('. $color->prices->id .')',
                'class' => 'form'. $color->prices->id
             ]]); ?>
</li>
  
<!-- Modal -->
    <div class="modal fade" id="editcolor<?= $color->id ?>" tabindex="-1" role="dialog" aria-labelledby="editcolor<?= $color->id ?>Label" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          </div>
      </div>
    </div>
<!-- /Modal -->
  <?php } else { ?>

<li class='clearfix ui-sortable-handle'>
      <?php $form = ActiveForm::begin(); ?>
    <?= $color->title ?>
  <div class="pull-right easy-pie-chart percentage"> 
    <?= $form->field($newprice, 'price')->textInput(['class' => 'price form-control'])->label(false) ?>
  </div>
    <?= $form->field($newprice, 'color_id')->hiddenInput(['value' => $color->id])->label(false) ?>
    <?= $form->field($newprice, 'size_id')->hiddenInput(['value' => $size->id])->label(false) ?>

      <?php ActiveForm::end(); ?>
</li>

<?php } ?>





  
    <?php endforeach; ?>
  
  
<hr>
  <?php endforeach; ?>
  
   
</ul>


<div class="widget-box transparent">
    <div class="widget-header">
      <h4 class="widget-title lighter smaller">Доп. материалы:</h4>
    </div>
    <div class="view unvisible" style='padding-bottom: 30px;'>
      <?= $this->render('create_material',['product' => $product]) ?>
    </div>
    <div class="view unvisible" style='padding-bottom: 30px;'>
      <?= $this->render('create_matrelation',['product' => $product]) ?>
    </div>
    <div class='widget-body'>
    <?php foreach($product->matrelations as $matrelations): ?>
    
        
        <ul class="item-list ui-sortable">
          <li class='clearfix ui-sortable-handle'>
          <?php $form = ActiveForm::begin(['options' => [
                'onchange' => 'matprice('. $matrelations->materials->id .')',
                'class' => 'matform'. $matrelations->materials->id
             ]]); ?>
            <?= $matrelations->materials->title ?>
            <div class="pull-right easy-pie-chart percentage"> 
              <?= $form->field($matrelations->materials, 'price')->textInput(['class' => 'price form-control'])->label(false) ?>
              <?= $form->field($matrelations->materials, 'id')->hiddenInput()->label(false) ?>
            </div>
            <div class="widget-toolbar view unvisible">
    <a data-toggle="modal" data-target="#editmaterial<?= $matrelations->materials->id ?>" href="<?= Url::toRoute(['editmaterial', 'id' => $matrelations->materials->id, 'product_id' => $product->id]); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
    <a href="<?= Url::toRoute(['deletematrelation', 'id' => $matrelations->id, 'product_id' => $product->id]); ?>"><i class='glyphicon glyphicon-minus-sign'></i></a>
    <a href="<?= Url::toRoute(['deletematerial', 'id' => $matrelations->materials->id, 'product_id' => $product->id]); ?>" onclick="return confirm('Вы уверенны?!')"><i class='ace-icon fa fa-trash-o bigger-130'></i></a>
    </div>
          <?php ActiveForm::end(); ?>
          </li>
        </ul>

        <!-- Modal -->
      <div class="modal fade" id="editmaterial<?= $matrelations->materials->id ?>" tabindex="-1" role="dialog" aria-labelledby="editmaterial<?= $matrelations->materials->id ?>" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
          </div>
        </div>
      </div>
<!-- /Modal -->

    <?php endforeach ?>
    </div>





</div>


</div>
</div>
</div>


    
<div class='col-md-3'>
  <div class="widget-box transparent">
    <div class="widget-header">
      <h4 class="widget-title lighter smaller">Работа: </h4>
    </div>
    <div class='widget-body'>
  
  
  
  <div class="view unvisible">
    <?= $this->render('create_serviceform',['product' => $product]) ?>
  </div>
  
  <?php foreach($product->relations as $relation): ?>
 
        <h4 class="smaller lighter green"><?= $relation->services['title'] ?>: 
          <?php if($relation->services['id'] !== 1 && $relation->services['id'] !== 2 && $relation->services['id'] !== 3){ ?>
          <div class="pull-right easy-pie-chart percentage view unvisible">
              <a data-toggle="modal" data-target="#editservice<?= $relation->services['id'] ?>" href="<?= Url::toRoute(['editservice', 'id' => $relation->services['id'], 'product_id' => $product->id]); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
            <a href="<?= Url::toRoute(['deleteservice', 'id' => $relation->services['id'], 'product_id' => $product->id]); ?> " onclick="return confirm('Вы уверенны?!')"><i class='ace-icon fa fa-trash-o bigger-130'></i></a>
          </div>
          <?php } ?>
        </h4>
<!-- Modal -->
    <div class="modal fade" id="editservice<?= $relation->services['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editserviceLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
          </div>
      </div>
    </div>
<!-- /Modal -->

    
    
    
    
    
<ul class='item-list ui-sortable'>
    <?php foreach($relation->services->prices as $price): ?>
    <?php if($price->product_id == $product->id || $price->product_id == 0){ ?>
  <li class='clearfix ui-sortable-handle'>
    <?php $form = ActiveForm::begin(['options' => [
                'onchange' => 'call('. $price->id .')',
                'class' => 'form'. $price->id
             ]]); ?>
      <?= (isset($price->size_id)) ? $price->size['title'] : 'service'. $relation->services['id'] ?>
    <div class="pull-right easy-pie-chart percentage">
      <?= $form->field($price, 'price')->textInput(['class' => 'form-control price sizew'. $price->size['id'].' service'. $relation->services['id'] ])->label(false) ?>
    </div>
    <?= $form->field($price, 'id')->hiddenInput()->label(false) ?>
    <?php ActiveForm::end(); ?>
  </li>
    <?php } ?>
    <?php endforeach; ?>
</ul>

  <?php endforeach; ?>

    </div>
</div>
</div>
</div>
  
</div>
</div>
</div>
  

  
<script>
    var service = [];
    <?php foreach($product->relations as $relation): ?>
        <?php foreach($relation->services->prices as $price): ?>
            <?php if( $price->service_id > 3  ){ ?>
             service[<?= $relation->services->id?>] = <?= $price->price ?>;
              <?php } ?>
        <?php endforeach; ?>
    <?php endforeach; ?>

    var material = [];
    <?php foreach($product->matrelations as $matrelations): ?>
      material[<?= $matrelations->materials->id ?>] = <?= $matrelations->materials->price ?>;
    <?php endforeach ?>
    
  function call(id) {
      var msg   = $('.form' + id).serialize();
        $.ajax({
          type: 'POST',
          url: 'updateprice?id='+id ,
          data: msg,
          error:  function(){
                alert('Возникла ошибка: ');
            }
        });
 
    }

    function matprice(id) {
      var msg   = $('.matform' + id).serialize();
        $.ajax({
          type: 'POST',
          url: 'updatematerialprice?id='+id ,
          data: msg,
          error:  function(){
                alert('Возникла ошибка: ');
            }
        });
 
    }
</script>