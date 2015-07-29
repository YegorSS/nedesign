<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CaruselSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carusels';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row-fluid">
  <div class="span12">
    <div class="w-box w-box-green">
    <div class="w-box-header">
        <h4><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="w-box-content">
      
        <div class="dataTables_wrapper form-inline">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <div class="dt-top-row">
    <div class="ColVis TableTools">
        <?= Html::a('Create Carusel', ['create'], ['class' => 'ColVis_Button btn']) ?>
    </div>
        </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
              'label'=>'Tilte',
              'attribute' => 'title',
              'format'=>'raw',
              'value' => function($data){
                return Html::a($data->title, ['update', 'id' => $data->id]);
              }
            ],
            'image',
            [
              'label'=>'Опубликованно',
              'attribute' => 'active',
              'contentOptions' => ['style'=>'text-align: center'],
              'format'=>'raw',
              'value' => function($data){
              if($data->active){
                return '<span><i class="splashy-okay"></i></span>';
              }else{
                return '<span><i class="splashy-error_x"></i></span>';
              }
              }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

      </div>
    </div>
  </div>
  </div>
</div>
