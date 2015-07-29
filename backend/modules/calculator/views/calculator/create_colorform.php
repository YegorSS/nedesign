<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use common\models\Colors;
use common\models\Prices;



$color = new Colors;
$price = new Prices;
?>
<?php $form = ActiveForm::begin([
    'action' => Url::toRoute(['createcolor', 'product_id' => $product->id, 'size_id' => $size_id]),
    'options' => [
        'class' => 'create-form',
    ],
]); ?>


<?= $form->field($color, 'title')->textInput(['style' => 'width: 60%; float:left;  margin-right: 10px;', 'placeholder' => 'название'])->label(false) ?>
<?= $form->field($price, 'price')->textInput(['style' => 'width: 20%; float:left;', 'placeholder' => 'цена'])->label(false) ?>
        <?= Html::submitButton('+', ['class' => 'btn btn-primary add', 'style' => 'float:right']) ?>

<?php ActiveForm::end(); ?>