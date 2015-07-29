<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use common\models\Products;

$product = new Products();

?>
<?php $form = ActiveForm::begin([
    'action' => Url::toRoute('createproduct'),
    'options' => [
        'class' => 'create-form',
    ],
    
]); ?>

    <?= $form->field($product, 'title')->textInput(['placeholder' => 'Название товара'])->label(false) ?> 
    <?= $form->field($product, 'formula')->textarea(['rows' => 5]) ?>
<br>
    <div class="form-group">
        <?= Html::submitButton('+', ['class' => 'btn btn-primary add']) ?>
    </div>

<?php ActiveForm::end(); ?>