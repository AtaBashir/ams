<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Teacher */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'tchr_id')->textInput() ?>

    <?= $form->field($model, 'tchr_disp_id')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'tchr_fname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tchr_lname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tchr_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tchr_postcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tchr_mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tchr_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tchr_email')->input('email') ?>

    <?= $form->field($model, 'tchr_active')->checkbox() ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
