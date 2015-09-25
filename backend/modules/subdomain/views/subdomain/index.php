<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'Домены';
$this->params['breadcrumbs'][] = $this->title;

foreach($subdomains as $subdomain)
{
	$array = explode('.', $subdomain);
	if(isset($array[1]) && $array[1] == 'php'){
		$name[] = $array[0];
	}
}

?>

<div class='w-box w-box-orange'>
	<div class="w-box-header">
		<h4>Поддомены</h4>
	</div>
	<div class="w-box-content">
	<div id="dt_colVis_Reorder_wrapper" class="dataTables_wrapper form-inline" role="grid">
		<div class="dt-top-row">
			<div class="ColVis TableTools">
			<button class="ColVis_Button TableTools_Button ColVis_MasterButton btn btn-mini btn-inverse">Columns</button>
				<?= Html::a('Создать поддомен', '@web/subdomain/subdomain/create', ['class' => 'ColVis_Button btn']) ?>
			</div>
		</div>
	<div class="dt-wrapper">
	<table id="dt_colVis_Reorder" class="table table-striped table-condensed dataTable" aria-describedby="dt_colVis_Reorder_info">
<?php foreach($name as $item): ?>
	<tr>
		<td>
			<?= Html::a($item .'.'. $_SERVER['HTTP_HOST'], 'http://'.$item .'.'. $_SERVER['HTTP_HOST']) ?>
		</td>
		<td>
			<?= Html::a('Удалить', ['delete', 'name' => $item], ['data' => [
                'confirm' => 'Вы уверенны?',
                'method' => 'post',
            ]]) ?>
		</td>
	</tr>
<?php endforeach ?>
	</table>
</div>
	</div>

</div>
</div>