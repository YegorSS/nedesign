<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use common\models\Services;
use common\models\Prices;



$service = new Services;
$price = new Prices;
?>
<?php $form = ActiveForm::begin([
    'action' => Url::toRoute(['createservice', 'product_id' => $product->id]),
    'options' => [
        'class' => 'create-form',
    ],
]); ?>


<?= $form->field($service, 'title')->textInput(['style' => 'width: 80%; float: left', 'placeholder' => 'название'])->label(false) ?>
<?= $form->field($price, 'price')->textInput(['style' => 'width: 15%; float: right', 'placeholder' => 'цена'])->label(false) ?>
<?= $form->field($service, 'unit')->checkbox() ?>
        <?= Html::submitButton('+', ['class' => 'btn btn-primary add']) ?>

<?php ActiveForm::end(); ?>