<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

use common\models\Matrelations;
use common\models\Materials;

$matrelation = new Matrelations();
$materials = Materials::find()->all();



?>
<?php $form = ActiveForm::begin([
    'action' => Url::toRoute(['creatematrelation']),
    'options' => [
        'class' => 'create-form',
    ],
]); ?>

<?= $form->field($matrelation, 'material_id')->dropDownList(ArrayHelper::map($materials, 'id', 'title'))->label(false) ?>
<?= $form->field($matrelation, 'product_id')->hiddenInput(['value' => $product->id])->label(false) ?>

<?= Html::submitButton('+', ['class' => 'btn btn-primary add', 'style' => 'float:right']) ?>

<?php ActiveForm::end(); ?>