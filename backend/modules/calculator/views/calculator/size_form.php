<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($size, 'title') ?>
<?php if($product) { ?>
<?php $variants_id = []; ?>
    <?php foreach($product->variants as $variant): ?>
<?php $variants_id[$variant->id] = $variant->title; ?>
    <?php endforeach; ?>
      <?= $form->field($size, 'variant_id')->radioList($variants_id) ?>
<?php } ?>


<?= $form->field($price, 'price')->textInput(['class' => 'form-control'])->label('Первый прогон') ?>

<?= $form->field($printprice, 'price')->textInput(['class' => 'form-control', 'name' => 'PrintPrices[price]'])->label('Печатные работы') ?>
    
    
    
<br><br>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>
