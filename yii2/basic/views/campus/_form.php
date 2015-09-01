<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\campus */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="campus-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'cmps_id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'cmps_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cmps_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
