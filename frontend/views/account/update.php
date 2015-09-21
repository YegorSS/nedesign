<?php $this->title = 'Страница пользователя';
$this->registerMetaTag(['name' => 'keywords', 'content' => '']);
$this->registerMetaTag(['name' => 'description', 'content' => '']);

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>

<?= $this->render('../site/_catalog', ['categories' => $categories]); ?>

<div class="content-holder">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <section class="title-section">
          <h1 class="title-header">Изменить данные</h1>
          <br>
        </section>
      </div>
    </div>

    <div class="row" style='margin-left: -15px; margin-top:40px;'>
      <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($user, 'username') ?>
                <?= $form->field($user, 'email') ?>
                <?= $form->field($user, 'telephone')->widget(MaskedInput::className(), [
      'mask' => '(999) 999-99-99',
  ])->textInput() ?>
                <?= $form->field($user, 'fio') ?>
                <?= $form->field($user, 'company') ?>
                <div class="form-group">
                    <?= Html::submitButton('Изменить данные', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
      </div>
    </div>
  </div>
</div>

<?= $this->render('../site/_footer') ?>