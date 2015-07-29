<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Posts */

$this->title = $model->header_meny;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row-fluid">
  <div class="span12">
    <div class="w-box w-box-orange">
    <div class="w-box-header">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="w-box-content">
      
        <div class="dataTables_wrapper form-inline">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="dt-top-row">
    <div class="ColVis TableTools">
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'ColVis_Button btn btn2']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'ColVis_Button btn',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
     </div>
        </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'header_meny',
            'h_1',
            'h_2',
            'text:html',
            'price:html',
            'keywords',
            'description',
            'alias',
            'category_id',
            'product_id',
            'mainimage',
            'rate',
            'voites',
            'active',
        ],
    ]) ?>
      </div>
    </div>
  </div>
  </div>
</div>
