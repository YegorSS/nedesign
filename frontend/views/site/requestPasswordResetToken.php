<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = 'Сброс пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_catalog', ['categories' => $categories]) ?>

<div class="content-holder">
<div class="container">
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <section class="title-section">
      <h1 class="title-header"><?= Html::encode($this->title) ?> </h1>
      <p>Введите email который Вы заполняли при регистрации. На него будет отправленна ссылка для сброса пароля.</p>
      <br>
    </section>
  </div>
</div>

<div class="site-request-password-reset">

    <div class="row" style='margin-left: -15px; margin-top:40px;'>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>
                <?= $form->field($model, 'email') ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>
</div>

