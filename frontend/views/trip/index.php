<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use common\models\Trip;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TripSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поездки';
$this->params['breadcrumbs'][] = $this->title;

$id1 = User::find()->where(['name' => 'Александр Николаевич'])->one()['id'];
$id2 = User::find()->where(['name' => 'Дмитрий Иванович'])->one()['id'];

$count1 = Trip::find()->where(['driver' => $id1])->count();
$count2 = Trip::find()->where(['driver' => $id2])->count();


if($count1 > $count2){
    $id = $id2;
} elseif ($count1 < $count2) {
    $id = $id1;
} elseif ($count1 == $count2) {
    $id0 = Trip::find()->orderBy(['date' => SORT_DESC])->one()['driver'];
    if($id0 == $id1){
        $id = $id2;
    } elseif($id0 == $id2) {
        $id = $id1;
    }
}

$driver = User::find()->where(['id' => $id])->one()['name'];
?>
<p>Следующая поездка у водителя: <span class="text-danger"><?=$driver?></span></p>
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