<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($product, 'title') ?>
    <?= $form->field($product, 'formula')->textarea() ?>
<br>
    <div class="form-group">
        <?= Html::submitButton('Создать', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>