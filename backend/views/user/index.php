<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
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
<div class="dt-top-row">
    <div class="ColVis TableTools">
     </div>
        </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
              'label'=>'Имя пльзователя',
              'attribute' => 'username',
              'format'=>'raw',
              'value' => function($data){
                return Html::a(Html::encode($data->username), ['update', 'id' => $data->id]);
              }
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
            // 'status',
             'created_at:date',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
      </div>
    </div>
  </div>
  </div>
</div>

