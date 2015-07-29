<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>


<?= $form->field($service, 'title') ?>
<?= $form->field($price, 'price') ?>
<?= $form->field($service, 'unit')->checkbox() ?>
<br><br>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>