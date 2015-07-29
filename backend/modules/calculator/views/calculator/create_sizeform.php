<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Products;
use common\models\Prices;
use common\models\Size;
use yii\helpers\Url;




$size = new Size;
$price = new Prices;
$printprice = new Prices;



?>

<?php $form = ActiveForm::begin([
    'action' => Url::toRoute(['createsize', 'product_id' => $product->id]),
    'options' => [
        'class' => 'create-form',
    ],
    ]); ?>

    <?= $form->field($size, 'title')->textInput(['style' => 'width: 90%;']) ?>

<?php if($product) { ?>
<?php $variants_id = []; ?>
    <?php foreach($product->variants as $variant): ?>
<?php $variants_id[$variant->id] = $variant->title; ?>
    <?php endforeach; ?>
      <?= $form->field($size, 'variant_id')->radioList($variants_id)->label(false) ?>
<?php } ?>


<?= $form->field($price, 'price')->textInput(['class' => 'form-control', 'style' => 'width: 120px; float: left; margin-right: 10px', 'placeholder' => 'Первый прогон'])->label(false) ?>

<?= $form->field($printprice, 'price')->textInput(['class' => 'form-control', 'name' => 'PrintPrices[price]', 'style' => 'width: 120px', 'placeholder' => 'Печатные работы'])->label(false) ?>
        <?= Html::submitButton('+', ['class' => 'btn btn-primary add']) ?>

<?php ActiveForm::end(); ?>