<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Trip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trip-form">

    <?php $form = ActiveForm::begin(['action' => $model->isNewRecord ? '/trip/create' : '/trip/update?id='.$model->id]); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
    	'options' => ['placeholder' => 'Введите дату поездки...'],
    	'convertFormat' => true,
    	'pluginOptions' => [
      	'autoclose' => true,
      	'format' => 'yyyy-M-dd',
      	'todayHighlight' => true
    	],
		]); ?>

    <?= $form->field($model, 'driver')->dropDownList( ArrayHelper::map(User::find()->all(), 'id', 'name') ) ?>
    
    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->id])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
