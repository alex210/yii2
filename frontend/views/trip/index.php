<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поездки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'striped' => false,
        'rowOptions' => function ($model, $key, $index, $grid) {
            return ['class' => $model->driver == 3 ? 'bg-success' : 'bg-info'];
        },
        'panel' => [    
           'before' => '<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#kartik-modal">Добавить поездку</button>',
        ],
        'toolbar' => '',
        'columns' => [
            'date',
            [
                'attribute' => 'driver',
                'value' => function($model) {
                    return $model->driverName->name;
                }
            ],
            [
                'attribute' => 'user_id',
                'value' => function($model) {
                    return $model->user->name;
                }
            ],
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn', 
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>
</div>

<div class="fade modal" id="kartik-modal" role="dialog" aria-labelledby="myModal1Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal1Label">Добавление поездки</h4>
            </div>
            <div class="modal-body">
                <?= $this->render('/trip/_form', [ 'model' => new \common\models\Trip()]); ?>
            </div>
        </div>
    </div>
</div>