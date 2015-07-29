<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
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
        <?= Html::a('Create Posts', ['create'], ['class' => 'ColVis_Button btn']) ?>
    </div>
        </div>

<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'title',
            [
              'label'=>'Tilte',
              'attribute' => 'title',
              'format'=>'raw',
              'value' => function($data){
                return Html::a($data->title, ['update', 'id' => $data->id]);
              }
            ],
            'header_meny',
            //'text:ntext',
            //'keywords',
            // 'description',
            'alias',
            [
              'label'=>'Опубликованно',
              'attribute' => 'active',
              'contentOptions' =>['style'=>'text-align: center'],
              'format'=>'raw',
              'value' => function($data){
              if($data->active){
                return '<span><i class="splashy-okay"></i></span>';
              }else{
                return '<span><i class="splashy-error_x"></i></span>';
              }
              }
            ],
            // 'category_id',
            // 'mainimage',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
<?php Pjax::end(); ?>
      </div>
    </div>
  </div>
  </div>
</div>

