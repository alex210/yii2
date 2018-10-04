<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Trip */

$this->title = 'Редактирование поездки за ' . $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Поездки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trip-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
