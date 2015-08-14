<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
<?php $form = ActiveForm::begin([
    'action' => Url::toRoute(['editmaterial', 'id' => $material->id, 'product_id' => $product_id]),
]); ?>


<?= $form->field($material, 'title')->textInput(['style' => 'width: 60%; float:left;  margin-right: 10px;', 'placeholder' => 'название'])->label(false) ?>
<?= $form->field($material, 'price')->textInput(['style' => 'width: 20%; float:left;', 'placeholder' => 'материал'])->label(false) ?>
<?= $form->field($material, 'workprice')->textInput(['style' => 'width: 20%; float:left;', 'placeholder' => 'работа'])->label(false) ?>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary add', 'style' => 'float:right']) ?>
<?php ActiveForm::end(); ?>