<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use common\models\Materials;
$material = new Materials;
?>
<?php $form = ActiveForm::begin([
    'action' => Url::toRoute(['creatematerial', 'product_id' => $product->id]),
    'options' => [
        'class' => 'create-form',
    ],
]); ?>


<?= $form->field($material, 'title')->textInput(['style' => 'width: 60%; float:left;  margin-right: 10px;', 'placeholder' => 'название'])->label(false) ?>
<?= $form->field($material, 'price')->textInput(['style' => 'width: 15%; float:left;', 'placeholder' => 'матер.'])->label(false) ?>
<?= $form->field($material, 'workprice')->textInput(['style' => 'width: 15%; float:left;', 'placeholder' => 'работа'])->label(false) ?>
<br>
        <?= Html::submitButton('+', ['class' => 'btn btn-primary add', 'style' => 'float:right']) ?>

<?php ActiveForm::end(); ?>