<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';


use backend\assets\AppAsset;
use yii\helpers\Url;

$this->registerCssFile('@web/beoro/js/lib/jquery-ui/css/Aristo/Aristo.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/img/icsw2_16/icsw2_16.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/img/splashy/splashy.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/img/flags/flags.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/js/lib/powertip/jquery.powertip.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('http://fonts.googleapis.com/css?family=Abel', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/css/login.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/beoro/css/beoro.css', ['depends'=>'backend\assets\AppAsset']);
$this->registerCssFile('@web/css/admin_style.css', ['depends'=>'backend\assets\AppAsset']);


$this->registerJsFile('@web/scripts/admin.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/jquery.fademenu.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/selectnav.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/jquery.actual.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/jquery.easing.1.3.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/lib/powertip/jquery.powertip-1.1.0.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/moment.min.js', ['depends'=>'backend\assets\AppAsset']);
$this->registerJsFile('@web/beoro/js/beoro_common.js', ['depends'=>'backend\assets\AppAsset']);

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
 <div class="container">
        
          <div class="main-container">
<div class='main-content'>
<div class="main-content-inner">
<div class="container">
<div id="login-wrapper" class="clearfix">
        <div class="main-col">
            <?= Html::img('@web/beoro/img/beoro.png', ['class' => 'logo_img']) ?>
            <div class="panel">
                <p class="heading_main"><?= Html::encode($this->title) ?></p>
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
            </div>
            <div class="panel" style="display:none">
                <p class="heading_main">Can't sign in?</p>
                <form id="forgot-validate" method="post">
                    <label for="forgot_email">Your email adress</label>
                    <input type="text" id="forgot_email" name="forgot_email" />
                    <div class="submit_sect">
                        <button type="submit" class="btn btn-beoro-3">Request New Password</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="login_links">
            <a href="javascript:void(0)" id="pass_login"><span>Forgot password?</span><span style="display:none">Account login</span></a>
        </div>
    </div>
</div>
</div>
</div>
          </div>
 </div>
    </div>
      <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
