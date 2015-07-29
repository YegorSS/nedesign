<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use common\models\Variants;

$variant = new Variants();
?>
<?php $form = ActiveForm::begin([
    'action' => Url::toRoute(['createvariant', 'product_id' => $product->id]),
    'options' => [
        'class' => 'create-form',
    ],
]); ?>

    <?= $form->field($variant, 'title')->textInput(['style' => 'width: 80%; float: left', 'placeholder' => 'название'])->label(false) ?>
    <?= Html::submitButton('+', ['class' => 'btn btn-primary add', 'style' => 'margin-left: 10px']) ?>

<?php ActiveForm::end(); ?>